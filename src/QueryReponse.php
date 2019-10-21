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
     * @param array|null $response
     */
    public function __construct(object $response)
    {
        $this->response = json_decode($response->getContents(), true);
    }

    /**
     * @return array
     */
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
}
