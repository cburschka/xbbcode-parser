<?php

namespace Ermarian\XBBCode\Processor;

use Ermarian\XBBCode\Tree\TagElementInterface;

/**
 * A simple wrapper that allows using callable functions as tag plugins.
 */
class CallbackTagProcessor extends TagProcessorBase {

  /**
   * A processing callback.
   *
   * @var callable
   */
  protected $processFunction;

  /**
   * TagProcessor constructor.
   *
   * @param callable $process
   *   A processing callback.
   */
  public function __construct(callable $process) {
    $this->processFunction = $process;
  }

  /**
   * Get the callback.
   *
   * @return callable
   *   A processing callback.
   */
  public function getProcess(): callable {
    return $this->processFunction;
  }

  /**
   * Set the callback.
   *
   * @param callable $process
   *   A processing callback.
   */
  public function setProcess(callable $process) {
    $this->processFunction = $process;
  }

  /**
   * {@inheritdoc}
   */
  public function doProcess(TagElementInterface $tag) {
    return $this->getProcess()($tag);
  }

}
