<?php

declare(strict_types=1);

namespace Syndesi\CypherEntityManager\Tests\Event;

use PHPUnit\Framework\TestCase;
use Syndesi\CypherDataStructures\Type\RelationConstraint;
use Syndesi\CypherEntityManager\Event\RelationConstraintPostCreateEvent;

class RelationConstraintPostCreateEventTest extends TestCase
{
    public function testRelationConstraintPostCreateEvent(): void
    {
        $element = new RelationConstraint();
        $event = new RelationConstraintPostCreateEvent($element);
        $this->assertSame($element, $event->getElement());
    }

    public function testElementManipulation(): void
    {
        $element = new RelationConstraint();
        $element->setType('UNIQUE');
        $event = new RelationConstraintPostCreateEvent($element);
        $this->assertSame('UNIQUE', $event->getElement()->getType());
        $event->getElement()->setType('NOT_NULL');
        $this->assertSame('NOT_NULL', $event->getElement()->getType());
    }
}
