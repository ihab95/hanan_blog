<?php

namespace Sdz\Blog\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Sdz\BlogBundle\Entity\Tag;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\Blog\Bundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallbacks()
 * 
 * @UniqueEntity(fields="titre", message="Un article existe déjà avec ce titre.")
 */
class Article
{


  /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime $date
     *
     * @ORM\Column(name="date", type="datetime")
	 * @Assert\DateTime()
     */
    private $date;

    /**
     * @var string $titre
     *
     * @ORM\Column(name="titre", type="string", length=255)
	 * @Assert\Length(min="10")
     */
    private $titre;

    /**
     * @var string $auteur
     *
     * @ORM\Column(name="auteur", type="string", length=255)
	 * @Assert\Length(min="2")
     */
    private $auteur;

    /**
     * @var string $contenu
     *
     * @ORM\Column(name="contenu", type="text")
	 * @Assert\NotBlank()
     */
    private $contenu;


    /**
     * Get id
     *
     * @return integer 
     */
	 
	 
	/**
     * @ORM\Column(name="publication", type="boolean")
     */
    private $publication;
		
	   /**
	   * @ORM\OneToOne(targetEntity="Sdz\Blog\Bundle\Entity\Image", cascade={"persist","remove"})
	   * @Assert\Valid()
	   */
	  private $image;
	  
	   /**
	   * @ORM\ManyToMany(targetEntity="Sdz\Blog\Bundle\Entity\Categorie", cascade={"persist"})
	   */
	  private $categories;
	  
		/**
	   * @ORM\OneToMany(targetEntity="Sdz\Blog\Bundle\Entity\Commentaire", mappedBy="article")
	   */
	  private $commentaires; // Ici commentaires prend un « s », car un article a plusieurs commentaires !

	 
	 
	 
    // Et modifions le constructeur pour mettre cet attribut publication à true par défaut
    public function __construct()
    { $this->setDate(new \Datetime());
	  $this->publication = true;
	  $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
	  $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }
  
  /**
    * Add categories
    *
    * @param Sdz\Blog\Bundle\Entity\Categorie $categories
    */
  public function addCategorie(\Sdz\Blog\Bundle\Entity\Categorie $categorie) // addCategorie sans « s » !
  {
    // Ici, on utilise l'ArrayCollection vraiment comme un tableau, avec la syntaxe []
    $this->categories[] = $categorie;
  }

  /**
    * Remove categories
    *
    * @param Sdz\Blog\Bundle\Entity\Categorie $categories
    */
  public function removeCategorie(\Sdz\Blog\Bundle\Entity\Categorie $categorie) // removeCategorie sans « s » !
  {
    // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
    $this->categories->removeElement($categorie);
  }

  /**
    * Get categories
    *
    * @return Doctrine\Common\Collections\Collection
    */
  public function getCategories() // Notez le « s », on récupère une liste de catégories ici !
  {
    return $this->categories;
  }
  
  
  
  /**
   * @param Sdz\Blog\Bundle\Entity\Image $image
   */
  public function setImage(\Sdz\Blog\Bundle\Entity\Image $image = null)
  {
    $this->image = $image;
  }

  /**
   * @return Sdz\Blog\Bundle\Entity\Image 
   */
  public function getImage()
  {
    return $this->image;
  }  
  
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Article
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
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Article
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set publication
     *
     * @param boolean $publication
     * @return Article
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return boolean 
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Add commentaires
     *
     * @param \Sdz\Blog\Bundle\Entity\Commentaire $commentaire
     * @return Article
     */
    public function addCommentaire(\Sdz\Blog\Bundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;
		$commentaires->setArticle($this); // On ajoute ceci

        return $this;
    }

    /**
     * Remove commentaires
     *
     * @param \Sdz\Blog\Bundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\Sdz\Blog\Bundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Add categories
     *
     * @param \Sdz\Blog\Bundle\Entity\Categorie $categories
     * @return Article
     */
    public function addCategory(\Sdz\Blog\Bundle\Entity\Categorie $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Sdz\Blog\Bundle\Entity\Categorie $categories
     */
    public function removeCategory(\Sdz\Blog\Bundle\Entity\Categorie $categories)
    {
        $this->categories->removeElement($categories);
    }
	
	/**
	* @ORM\PreUpdate
	*/
	public function updateDate()
	{
		$this->setDateEdition(new \Datetime());
	}

    /**
     * Set dateEdition
     *
     * @param \DateTime $dateEdition
     * @return Article
     */
    public function setDateEdition($dateEdition)
    {
        $this->dateEdition = $dateEdition;

        return $this;
    }

    /**
     * Get dateEdition
     *
     * @return \DateTime 
     */
    public function getDateEdition()
    {
        return $this->dateEdition;
    }

    /**
     * Set nbCommentaires
     *
     * @param integer $nbCommentaires
     * @return Article
     */
    public function setNbCommentaires($nbCommentaires)
    {
        $this->nbCommentaires = $nbCommentaires;

        return $this;
    }

    /**
     * Get nbCommentaires
     *
     * @return integer 
     */
    public function getNbCommentaires()
    {
        return $this->nbCommentaires;
    }
	
}
