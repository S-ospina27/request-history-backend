<?php

namespace Database\Class;

class ReadDevelopers implements \JsonSerializable {

	private ?int $iddevelopers = null;
	private ?int $idroles = null;
	private ?int $idstates = null;
	private ?string $developers_name = null;
	private ?string $developerscol_type = null;
	private ?string $developers_email = null;
	private ?string $roles_name = null;
	private ?string $states_name = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadDevelopers {
		$readdevelopers = new ReadDevelopers();

		$readdevelopers->setIddevelopers(
			isset(request->iddevelopers) ? request->iddevelopers : null
		);

		$readdevelopers->setIdroles(
			isset(request->idroles) ? request->idroles : null
		);

		$readdevelopers->setIdstates(
			isset(request->idstates) ? request->idstates : null
		);

		$readdevelopers->setDevelopersName(
			isset(request->developers_name) ? request->developers_name : null
		);

		$readdevelopers->setDeveloperscolType(
			isset(request->developerscol_type) ? request->developerscol_type : null
		);

		$readdevelopers->setDevelopersEmail(
			isset(request->developers_email) ? request->developers_email : null
		);

		$readdevelopers->setRolesName(
			isset(request->roles_name) ? request->roles_name : null
		);

		$readdevelopers->setStatesName(
			isset(request->states_name) ? request->states_name : null
		);

		return $readdevelopers;
	}

	public function getIddevelopers(): ?int {
		return $this->iddevelopers;
	}

	public function setIddevelopers(?int $iddevelopers): ReadDevelopers {
		$this->iddevelopers = $iddevelopers;
		return $this;
	}

	public function getIdroles(): ?int {
		return $this->idroles;
	}

	public function setIdroles(?int $idroles): ReadDevelopers {
		$this->idroles = $idroles;
		return $this;
	}

	public function getIdstates(): ?int {
		return $this->idstates;
	}

	public function setIdstates(?int $idstates): ReadDevelopers {
		$this->idstates = $idstates;
		return $this;
	}

	public function getDevelopersName(): ?string {
		return $this->developers_name;
	}

	public function setDevelopersName(?string $developers_name): ReadDevelopers {
		$this->developers_name = $developers_name;
		return $this;
	}

	public function getDeveloperscolType(): ?string {
		return $this->developerscol_type;
	}

	public function setDeveloperscolType(?string $developerscol_type): ReadDevelopers {
		$this->developerscol_type = $developerscol_type;
		return $this;
	}

	public function getDevelopersEmail(): ?string {
		return $this->developers_email;
	}

	public function setDevelopersEmail(?string $developers_email): ReadDevelopers {
		$this->developers_email = $developers_email;
		return $this;
	}

	public function getRolesName(): ?string {
		return $this->roles_name;
	}

	public function setRolesName(?string $roles_name): ReadDevelopers {
		$this->roles_name = $roles_name;
		return $this;
	}

	public function getStatesName(): ?string {
		return $this->states_name;
	}

	public function setStatesName(?string $states_name): ReadDevelopers {
		$this->states_name = $states_name;
		return $this;
	}

}