<?php

namespace Ermarian\XBBCode\Tree;

use Ermarian\XBBCode\Processor\TagProcessorInterface;

/**
 * A tag occurrence as processed by tag plugins.
 */
interface TagElementInterface extends NodeElementInterface {

  /**
   * Get the tag name of this element.
   *
   * @return string
   *   The tag name.
   */
  public function getName(): string;

  /**
   * Retrieve the un-parsed argument string.
   *
   * @return string
   */
  public function getArgument(): string;

  /**
   * Retrieve a particular attribute of the element.
   *
   * [tag NAME=VALUE]...[/tag]
   *
   * @param string $name
   *   The name of the attribute, or NULL.
   *
   * @return string|null
   *   The value of this attribute, or NULL if it isn't set.
   */
  public function getAttribute($name);

  /**
   * Return all attribute values.
   *
   * @return string[]
   *   The tag attributes, indexed by name.
   */
  public function getAttributes(): array;

  /**
   * Retrieve the option-type attribute of the element.
   *
   * [tag=OPTION]...[/tag]
   *
   * @return string
   *   The value of the option.
   */
  public function getOption(): string;

  /**
   * Retrieve the content source of the tag.
   *
   * [tag]CONTENT[/tag]
   *
   * This is the content of the tag before rendering.
   *
   * @return string
   *   The tag content source.
   */
  public function getSource(): string;

  /**
   * Retrieve the content including the opening and closing tags.
   *
   * Tags inside the content will still be rendered.
   *
   * @return string
   *   The tag source.
   */
  public function getOuterSource(): string;

  /**
   * Retrieve the parent of the current tag.
   *
   * This may be either another tag or the root element.
   *
   * Note that the parent's rendered content will obviously be incomplete
   * during rendering, and should not be accessed.
   *
   * @return \Ermarian\XBBCode\Tree\NodeElementInterface
   */
  public function getParent(): NodeElementInterface;

  /**
   * Set the parent of the current tag.
   *
   * @param \Ermarian\XBBCode\Tree\NodeElementInterface $parent
   */
  public function setParent(NodeElementInterface $parent);

  /**
   * Get the assigned processor.
   *
   * @var \Ermarian\XBBCode\Processor\TagProcessorInterface
   */
  public function getProcessor();

  /**
   * Assign a processor to this tag element.
   *
   * @param \Ermarian\XBBCode\Processor\TagProcessorInterface $processor
   *   A tag processor.
   */
  public function setProcessor(TagProcessorInterface $processor);

}
