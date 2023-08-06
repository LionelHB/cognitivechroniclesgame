<?php

namespace App\Entity;

use App\Repository\NftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NftRepository::class)]
class Nft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateFirstSale = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateLastSale = null;

    #[ORM\Column(length: 255)]
    private ?string $identificationKey = null;

    #[ORM\Column(length: 255)]
    private ?string $nftPath = null;

    #[ORM\Column]
    private ?float $priceETH = null;

    #[ORM\Column]
    private ?float $priceEUR = null;

    #[ORM\Column]
    private ?float $priceUSD = null;

    #[ORM\Column]
    private ?bool $isPublic = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?int $view = null;

    #[ORM\Column]
    private ?int $addLike = null;

    #[ORM\Column]
    private ?int $addFavory = null;

    #[ORM\ManyToOne(inversedBy: 'nfts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SubCategory $subCategory = null;

    #[ORM\OneToMany(mappedBy: 'nft', targetEntity: Comment::class)]
    private Collection $comment;

    #[ORM\ManyToOne(inversedBy: 'nfts')]
    private ?Anthology $anthology = null;

    #[ORM\ManyToOne(inversedBy: 'nfts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $ownerUser = null;

    #[ORM\Column(length: 255)]
    private ?string $creator = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    public function __construct()
    {
        $this->comment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateFirstSale(): ?\DateTimeInterface
    {
        return $this->dateFirstSale;
    }

    public function setDateFirstSale(\DateTimeInterface $dateFirstSale): static
    {
        $this->dateFirstSale = $dateFirstSale;

        return $this;
    }

    public function getDateLastSale(): ?\DateTimeInterface
    {
        return $this->dateLastSale;
    }

    public function setDateLastSale(\DateTimeInterface $dateLastSale): static
    {
        $this->dateLastSale = $dateLastSale;

        return $this;
    }

    public function getIdentificationKey(): ?string
    {
        return $this->identificationKey;
    }

    public function setIdentificationKey(string $identificationKey): static
    {
        $this->identificationKey = $identificationKey;

        return $this;
    }

    public function getNftPath(): ?string
    {
        return $this->nftPath;
    }

    public function setNftPath(string $nftPath): static
    {
        $this->nftPath = $nftPath;

        return $this;
    }

    public function getPriceETH(): ?float
    {
        return $this->priceETH;
    }

    public function setPriceETH(float $priceETH): static
    {
        $this->priceETH = $priceETH;

        return $this;
    }

    public function getPriceEUR(): ?float
    {
        return $this->priceEUR;
    }

    public function setPriceEUR(float $priceEUR): static
    {
        $this->priceEUR = $priceEUR;

        return $this;
    }

    public function getPriceUSD(): ?float
    {
        return $this->priceUSD;
    }

    public function setPriceUSD(float $priceUSD): static
    {
        $this->priceUSD = $priceUSD;

        return $this;
    }

    public function isIsPublic(): ?bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): static
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getView(): ?int
    {
        return $this->view;
    }

    public function setView(int $view): static
    {
        $this->view = $view;

        return $this;
    }

    public function getAddLike(): ?int
    {
        return $this->addLike;
    }

    public function setAddLike(int $addLike): static
    {
        $this->addLike = $addLike;

        return $this;
    }

    public function getAddFavory(): ?int
    {
        return $this->addFavory;
    }

    public function setAddFavory(int $addFavory): static
    {
        $this->addFavory = $addFavory;

        return $this;
    }

    public function getSubCategory(): ?SubCategory
    {
        return $this->subCategory;
    }

    public function setSubCategory(?SubCategory $subCategory): static
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comment->contains($comment)) {
            $this->comment->add($comment);
            $comment->setNft($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getNft() === $this) {
                $comment->setNft(null);
            }
        }

        return $this;
    }

    public function getAnthology(): ?Anthology
    {
        return $this->anthology;
    }

    public function setAnthology(?Anthology $anthology): static
    {
        $this->anthology = $anthology;

        return $this;
    }

    public function getOwnerUser(): ?User
    {
        return $this->ownerUser;
    }

    public function setOwnerUser(?User $ownerUser): static
    {
        $this->ownerUser = $ownerUser;

        return $this;
    }

    public function getCreator(): ?string
    {
        return $this->creator;
    }

    public function setCreator(string $creator): static
    {
        $this->creator = $creator;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
