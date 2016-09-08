<?php

namespace CommunitiesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Thread
 *
 * @ORM\Table(name="thread")
 * @ORM\Entity(repositoryClass="CommunitiesBundle\Repository\ThreadRepository")
 */
class Thread
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Community", inversedBy="threads")
     * @ORM\JoinColumn(name="community_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $community;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="thread")
     */
    private $messages;

    public function __construct() {
        $this->messages = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Thread
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Thread
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Thread
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Thread
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Add message
     *
     * @param \CommunitiesBundle\Entity\Message $message
     *
     * @return Thread
     */
    public function addMessage(\CommunitiesBundle\Entity\Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \CommunitiesBundle\Entity\Message $message
     */
    public function removeMessage(\CommunitiesBundle\Entity\Message $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Set community
     *
     * @param \CommunitiesBundle\Entity\Community $community
     *
     * @return Thread
     */
    public function setCommunity(\CommunitiesBundle\Entity\Community $community = null)
    {
        $this->community = $community;

        return $this;
    }

    /**
     * Get community
     *
     * @return \CommunitiesBundle\Entity\Community
     */
    public function getCommunity()
    {
        return $this->community;
    }
}
