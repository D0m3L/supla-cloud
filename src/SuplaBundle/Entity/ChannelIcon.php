<?php
/*
 Copyright (C) AC SOFTWARE SP. Z O.O.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace SuplaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SuplaBundle\Enums\ChannelFunction;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="SuplaBundle\Repository\ChannelIconRepository")
 * @ORM\Table(name="supla_channel_icons")
 */
class ChannelIcon {
    use BelongsToUser;

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"basic"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="channelIcons")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\Column(name="func", type="integer", nullable=false)
     * @Groups({"basic"})
     */
    private $function;

    /**
     * @ORM\Column(name="image1", type="blob", nullable=false)
     */
    private $image1;

    /**
     * @ORM\Column(name="image2", type="blob", nullable=true)
     */
    private $image2;

    /**
     * @ORM\Column(name="image3", type="blob", nullable=true)
     */
    private $image3;

    /**
     * @ORM\Column(name="image4", type="blob", nullable=true)
     */
    private $image4;

    public function __construct(User $user, ChannelFunction $function) {
        $this->user = $user;
        $this->function = $function->getValue();
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUser(): User {
        return $this->user;
    }

    public function getFunction(): ChannelFunction {
        return new ChannelFunction($this->function);
    }

    public function getImage1() {
        return $this->image1;
    }

    public function setImage1($image1) {
        $this->image1 = $image1;
    }

    public function getImage2() {
        return $this->image2;
    }

    public function setImage2($image2) {
        $this->image2 = $image2;
    }

    public function getImage3() {
        return $this->image3;
    }

    public function setImage3($image3) {
        $this->image3 = $image3;
    }

    public function getImage4() {
        return $this->image4;
    }

    public function setImage4($image4) {
        $this->image4 = $image4;
    }
}