<?php

namespace Ermarian\XBBCode\Tree;

use Ermarian\XBBCode\Processor\TagProcessorInterface;
use Ermarian\XBBCode\XBBCodeParser;

/**
 * A BBCode tag element.
 */
class TagElement extends NodeElement implements TagElementInterface {

  /**
   * The processor handling this element.
   *
   * @var \Ermarian\XBBCode\Processor\TagProcessorInterface
   */
  private $processor;

  /**
   * The tag argument.
   *
   * @var string
   */
  private $argument;

  /**
   * The tag content source.
   *
   * @var string
   */
  private $source;

  /**
   * The tag name.
   *
   * @var string
   */
  private $name;

  /**
   * The tag attributes.
   *
   * @var string[]
   */
  private $attributes = [];

  /**
   * The tag option.
   *
   * @var string
   */
  private $option;

  /**
   * TagElement constructor.
   *
   * @param string $name
   *   The tag name.
   * @param string $argument
   *   The argument (everything past the tag name)
   * @param string $source
   *   The source of the content.
   */
  public function __construct($name, $argument, $source) {
    $this->name = $name;
    $this->argument = $argument;
    $this->source = $source;

    if ($argument && $argument[0] === '=') {
      $this->option = XBBCodeParser::parseOption($argument);
    }
    else {
      $this->attributes = XBBCodeParser::parseAttributes($argument);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function getArgument() {
    return $this->argument;
  }

  /**
   * {@inheritdoc}
   */
  public function getAttribute($name) {
    if (isset($this->attributes[$name])) {
      return $this->attributes[$name];
    }
    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getAttributes() {
    return $this->attributes;
  }

  /**
   * {@inheritdoc}
   */
  public function getOption() {
    return $this->option;
  }

  /**
   * {@inheritdoc}
   */
  public function getSource() {
    return $this->source;
  }

  /**
   * {@inheritdoc}
   */
  public function getOuterSource() {
    // Reconstruct the opening and closing tags, but render the content.
    if (!isset($this->outerSource)) {
      $content = $this->getContent();
      $this->outerSource = "[{$this->name}{$this->argument}]{$content}[/{$this->name}]";
    }
    return $this->outerSource;
  }

  /**
   * {@inheritdoc}
   *
   * @throws \InvalidArgumentException
   *   If the tag does not have an assigned processor.
   */
  public function render() {
    if (!$this->getProcessor()) {
      throw new \InvalidArgumentException("Missing processor for tag [{$this->name}]");
    }
    return $this->getProcessor()->process($this);
  }

  /**
   * {@inheritdoc}
   */
  public function getProcessor() {
    return $this->processor;
  }

  /**
   * {@inheritdoc}
   */
  public function setProcessor(TagProcessorInterface $processor) {
    $this->processor = $processor;
  }

}
