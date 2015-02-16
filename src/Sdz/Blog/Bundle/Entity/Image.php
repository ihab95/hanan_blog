<?php
// src/Sdz/Blog/Bundle/Entity/Image.php

namespace Sdz\Blog\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Sdz\Blog\Bundle\Entity\Image
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\ImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Image
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
   * @var string $url
   *
   * @ORM\Column(name="url", type="string", length=255)
   */
  private $url;

  /**
   * @var string $alt
   *
   * @ORM\Column(name="alt", type="string", length=255)
   */
  private $alt;

  private $file;
  
  private $tempFilename;
	
  // Les getters et setters

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }
	

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }
	
	  // On modifie le setter de File, pour prendre en compte l'upload d'un fichier lorsqu'il en existe d�j� un autre
  public function setFile(UploadedFile $file)
  {
    $this->file = $file;

    // On v�rifie si on avait d�j� un fichier pour cette entit�
    if (null !== $this->url) {
      // On sauvegarde l'extension du fichier pour le supprimer plus tard
      $this->tempFilename = $this->url;
	  echo "salut";
      // On r�initialise les valeurs des attributs url et alt
      $this->url = null;
      $this->alt = null;

    }
  }

  /**
   * @ORM\PrePersist()
   * @ORM\PreUpdate()
   */
  public function preUpload()
  {
    // Si jamais il n'y a pas de fichier (champ facultatif)
    if (null === $this->file) {
		echo "salut";
      return;
    }
	echo "lutzzz";
    // Le nom du fichier est son id, on doit juste stocker �galement son extension
    // Pour faire propre, on devrait renommer cet attribut en � extension �, plut�t que � url �
    $this->url = $this->file->guessExtension();

    // Et on g�n�re l'attribut alt de la balise <img>, � la valeur du nom du fichier sur le PC de l'internaute
    $this->alt = $this->file->getClientOriginalName();
  }

  /**
   * @ORM\PostPersist()
   * @ORM\PostUpdate()
   */
  public function upload()
  {
    // Si jamais il n'y a pas de fichier (champ facultatif)
    if (null === $this->file) {
      return;
    }

    // Si on avait un ancien fichier, on le supprime
    if (null !== $this->tempFilename) {
      $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
      if (file_exists($oldFile)) {
        unlink($oldFile);
      }
    }

    // On d�place le fichier envoy� dans le r�pertoire de notre choix
    $this->file->move(
      $this->getUploadRootDir(), // Le r�pertoire de destination
      $this->id.'.'.$this->url   // Le nom du fichier � cr�er, ici � id.extension �
    );
  }

  /**
   * @ORM\PreRemove()
   */
  public function preRemoveUpload()
  {
    // On sauvegarde temporairement le nom du fichier, car il d�pend de l'id
    $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->url;
    print($this->tempFilename);
  }

  /**
   * @ORM\PostRemove()
   */
  public function removeUpload()
  {
    // En PostRemove, on n'a pas acc�s � l'id, on utilise notre nom sauvegard�
    if (file_exists($this->tempFilename)) {
      // On supprime le fichier
      unlink($this->tempFilename);
    }
  }

  public function getUploadDir()
  {
    // On retourne le chemin relatif vers l'image pour un navigateur
    return 'bundles/sdzblog/images/';
  }

  protected function getUploadRootDir()
  {
    // On retourne le chemin relatif vers l'image pour notre code PHP
    return __DIR__.'/../../../../../web/'.$this->getUploadDir();
  }
  
  public function getWebPath()
  {
    return $this->getUploadDir().'/'.$this->getId().'.'.$this->getUrl();
  }
}