<?php

namespace WakeOnWeb\Component\Swagger\Specification;

use InvalidArgumentException;

/**
 * @author Quentin Schuler <q.schuler@wakeonweb.com>
 */
class PathItem
{
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_POST = 'POST';
    const METHOD_DELETE = 'DELETE';
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_HEAD = 'HEAD';
    const METHOD_PATCH = 'PATCH';

    /**
     * @var Operation|null
     */
    private $get;

    /**
     * @var Operation|null
     */
    private $put;

    /**
     * @var Operation|null
     */
    private $post;

    /**
     * @var Operation|null
     */
    private $delete;

    /**
     * @var Operation|null
     */
    private $options;

    /**
     * @var Operation|null
     */
    private $head;

    /**
     * @var Operation|null
     */
    private $patch;

    /**
     * @var ParametersChain
     */
    private $parameters;

    /**
     * PathItem constructor.
     *
     * @param Operation|null  $get
     * @param Operation|null  $put
     * @param Operation|null  $post
     * @param Operation|null  $delete
     * @param Operation|null  $options
     * @param Operation|null  $head
     * @param Operation|null  $patch
     * @param ParametersChain $parameters
     */
    public function __construct(Operation $get = null, Operation $put = null, Operation $post = null, Operation $delete = null, Operation $options = null, Operation $head = null, Operation $patch = null, ParametersChain $parameters)
    {
        $this->get = $get;
        $this->put = $put;
        $this->post = $post;
        $this->delete = $delete;
        $this->options = $options;
        $this->head = $head;
        $this->patch = $patch;
        $this->parameters = $parameters;
    }

    /**
     * @return Operation|null
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @return Operation|null
     */
    public function getPut()
    {
        return $this->put;
    }

    /**
     * @return Operation|null
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return Operation|null
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @return Operation|null
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return Operation|null
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @return Operation|null
     */
    public function getPatch()
    {
        return $this->patch;
    }

    /**
     * @return ParametersChain
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param string $method
     *
     * @return Operation|null
     *
     * @throws InvalidArgumentException When the given `$method` is not one of the `PathItem::METHOD_*` constant value.
     */
    public function getOperationFor($method)
    {
        switch ($method) {
            case self::METHOD_GET:
                return $this->getGet();

            case self::METHOD_PUT:
                return $this->getPut();

            case self::METHOD_POST:
                return $this->getPost();

            case self::METHOD_DELETE:
                return $this->getDelete();

            case self::METHOD_OPTIONS:
                return $this->getOptions();

            case self::METHOD_HEAD:
                return $this->getHead();

            case self::METHOD_PATCH:
                return $this->getPatch();

            default:
                throw new InvalidArgumentException(
                    'The $method argument should be one of the PathItem::METHOD_* constant value.'
                );
        }
    }
}
