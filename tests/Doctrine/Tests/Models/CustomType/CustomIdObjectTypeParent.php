<?php
/**
 * @author Stefano Torresi (http://stefanotorresi.it)
 * @license See the file LICENSE.txt for copying permission.
 * ************************************************
 */

namespace Doctrine\Tests\Models\CustomType;

use Doctrine\Tests\DbalTypes\CustomIdObject;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="custom_id_type_parent")
 */
class CustomIdObjectTypeParent
{
    /**
     * @Id @Column(type="CustomIdObject")
     *
     * @var CustomIdObject
     */
    public $id;

    /**
     * @OneToMany(targetEntity="Doctrine\Tests\Models\CustomType\CustomIdObjectTypeChild", cascade={"persist", "remove"}, mappedBy="parent")
     */
    public $children;

    /**
     * @param CustomIdObject|string $id
     */
    public function __construct($id)
    {
        if (! $id instanceof CustomIdObject) {
            $id = new CustomIdObject($id);
        }

        $this->id       = $id;
        $this->children = new ArrayCollection();
    }
}
