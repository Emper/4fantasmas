<?php

namespace CommunitiesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Community
 *
 * @ORM\Table(name="community")
 * @ORM\Entity(repositoryClass="CommunitiesBundle\Repository\CommunityRepository")
 */
class Community
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text", nullable=true)
     */
    private $intro;

    /**
     * @ORM\OneToMany(targetEntity="Thread", mappedBy="community")
     */
    private $threads;

    public function __construct() {
        $this->threads = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Community
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Set intro
     *
     * @param string $intro
     *
     * @return Community
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Add thread
     *
     * @param \CommunitiesBundle\Entity\Thread $thread
     *
     * @return Community
     */
    public function addThread(\CommunitiesBundle\Entity\Thread $thread)
    {
        $this->threads[] = $thread;

        return $this;
    }

    /**
     * Remove thread
     *
     * @param \CommunitiesBundle\Entity\Thread $thread
     */
    public function removeThread(\CommunitiesBundle\Entity\Thread $thread)
    {
        $this->threads->removeElement($thread);
    }

    /**
     * Get threads
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getThreads()
    {
        return $this->threads;
    }
}
