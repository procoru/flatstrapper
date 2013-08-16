<?php
use Dyon\Flatstrapper\Badge;

class BadgeTest extends FlatstrapperWrapper
{
  // Matchers ------------------------------------------------------ /

  private function createMatcher($class)
  {
    $class = ($class == 'normal') ? null : ' badge-'.$class;

    return array(
      'tag' => 'span',
      'attributes' => array('class' => 'bar badge'.$class),
      'content' => 'foo',
    );
  }

  // Data providers  ----------------------------------------------- /

  public function classes()
  {
    return array(
      array('normal'),
      array('important'),
      array('info'),
      array('inverse'),
      array('success'),
      array('warning'),
    );
  }

  // Tests --------------------------------------------------------- /

  public function testCustom()
  {
    $badge = Badge::custom('success', 'foo', array('class' => 'bar'));
    $match = $this->createMatcher('success');

    $this->assertHTML($match, $badge);
  }

  /**
   * @dataProvider classes
   */
  public function testStatic($class)
  {
    $badge = Badge::$class('foo', array('class' => 'bar'));
    $match = $this->createMatcher($class);

    $this->assertHTML($match, $badge);
  }
}
