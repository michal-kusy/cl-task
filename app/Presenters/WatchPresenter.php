<?php declare(strict_types=1);

namespace App\Presenters;

use App\Exceptions\WatchNotFoundException;
use App\Mappings\WatchDtoToArray;
use App\Model\Repositories\WatchRepository;
use App\Util\Assert;
use Nette\Application\BadRequestException;
use Nette\Http\IRequest;

final class WatchPresenter extends BasePresenter
{
    /** @var WatchRepository */
    private $repository;

    /** @var WatchDtoToArray */
    private $mapper;

    public function __construct(WatchRepository $watchRepository, WatchDtoToArray $mapper)
    {
        parent::__construct();
        $this->repository = $watchRepository;
        $this->mapper = $mapper;
    }

    public function actionGetById($id): void
    {
        if ($this->getHttpRequest()->getMethod() !== IRequest::GET) {
            throw new BadRequestException('Unsupported request method', 400);
        }
        if (!Assert::isStringInteger($id)) {
            throw new BadRequestException('Param ID is required and must be a integer', 400);
        }

        try {
            $watch = $this->repository->getWatchById((int)$id);
            $this->sendJson($this->mapper->toArray($watch));
        } catch (WatchNotFoundException $e) { // not found
            throw new BadRequestException(sprintf('Watch with id:%d was not found', $id), 404);
        }
    }
}