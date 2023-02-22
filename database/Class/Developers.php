<?php

namespace Database\Class;

class Developers implements \JsonSerializable {

	private ?int $iddevelopers = null;
	private ?int $idroles = null;
	private ?int $idstates = null;
	private ?string $developers_name = null;
	private ?string $developerscol_type = null;
	private ?string $developers_email = null;
	private ?string $developers_password = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Developers {
		$developers = new Developers();

		$developers->setIddevelopers(
			isset(request->iddevelopers) ? (int) request->iddevelopers : null
		);

		$developers->setIdroles(
			isset(request->idroles) ? (int) request->idroles : null
		);

		$developers->setIdstates(
			isset(request->idstates) ? (int) request->idstates : null
		);

		$developers->setDevelopersName(
			isset(request->developers_name) ? request->developers_name : null
		);

		$developers->setDeveloperscolType(
			isset(request->developerscol_type) ? request->developerscol_type : null
		);

		$developers->setDevelopersEmail(
			isset(request->developers_email) ? request->developers_email : null
		);

		$developers->setDevelopersPassword(
			isset(request->developers_password) ? request->developers_password : null
		);

		return $developers;
	}

	public function getIddevelopers(): ?int {
		return $this->iddevelopers;
	}

	public function setIddevelopers(?int $iddevelopers): Developers {
		$this->iddevelopers = $iddevelopers;
		return $this;
	}

	public function getIdroles(): ?int {
		return $this->idroles;
	}

	public function setIdroles(?int $idroles): Developers {
		$this->idroles = $idroles;
		return $this;
	}

	public function getIdstates(): ?int {
		return $this->idstates;
	}

	public function setIdstates(?int $idstates): Developers {
		$this->idstates = $idstates;
		return $this;
	}

	public function getDevelopersName(): ?string {
		return $this->developers_name;
	}

	public function setDevelopersName(?string $developers_name): Developers {
		$this->developers_name = $developers_name;
		return $this;
	}

	public function getDeveloperscolType(): ?string {
		return $this->developerscol_type;
	}

	public function setDeveloperscolType(?string $developerscol_type): Developers {
		$this->developerscol_type = $developerscol_type;
		return $this;
	}

	public function getDevelopersEmail(): ?string {
		return $this->developers_email;
	}

	public function setDevelopersEmail(?string $developers_email): Developers {
		$this->developers_email = $developers_email;
		return $this;
	}

	public function getDevelopersPassword(): ?string {
		return $this->developers_password;
	}

	public function setDevelopersPassword(?string $developers_password): Developers {
		$this->developers_password = $developers_password;
		return $this;
	}

}