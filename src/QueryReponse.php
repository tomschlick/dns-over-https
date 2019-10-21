<?php declare(strict_types=1);


namespace TomSchlick\DoH;


class QueryReponse
{
    /**
     * @var array|null
     */
    protected $response;

    /**
     * QueryReponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * @return array
     */
    public function getAnswer() : array
    {
        return $this->response['Answer'];
    }

    public function getQuestion() : array
    {
        return $this->response['Question'];
    }

    public function getStatus() : StatusType
    {
        return new StatusType($this->response['Status']);
    }

    public function wasTruncated() : bool
    {
        return $this->response['TC'];
    }

    public function wasSuccessful() : bool
    {
        return $this->getStatus()->is(StatusType::NO_ERROR);
    }
}
