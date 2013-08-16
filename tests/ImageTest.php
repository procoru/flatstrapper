<?php
use Dyon\Flatstrapper\Image;

class ImageTest extends FlatstrapperWrapper
{
  /**
   * URL example
   * @var string
   */
  private $url = 'http://www.foo.fr/bar.jpg';

  // Matchers ------------------------------------------------------ /

  private function createMatcher($class)
  {
    return array(
      'tag' => 'img',
      'attributes' => array(
        'alt'      => 'foo',
        'class'    => 'foo img-'.$class,
        'data-foo' => 'bar',
        'src'      => $this->url,
      ),
    );
  }

  // Data providers ------------------------------------------------ /

  public function classes()
  {
    return array(
      array('circle'),
      array('polaroid'),
      array('rounded'),
    );
  }

  // Tests --------------------------------------------------------- /

  /**
   * @dataProvider classes
   */
  public function testImage($class)
  {
    $image = Image::$class($this->url, 'foo', $this->testAttributes);

    $this->assertHTML($this->createMatcher($class), $image);
  }
}
