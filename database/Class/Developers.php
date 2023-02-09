<?php

namespace Database\Class;

class Developers implements \JsonSerializable {

	private ?int $iddevelopers = null;
	private ?string $developers_name = null;
	private ?string $developerscol_type = null;
	private ?int $idstates = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Developers {
		$developers = new Developers();

		$developers->setIddevelopers(
			isset(request->iddevelopers) ? request->iddevelopers : null
		);

		$developers->setDevelopersName(
			isset(request->developers_name) ? request->developers_name : null
		);

		$developers->setDeveloperscolType(
			isset(request->developerscol_type) ? request->developerscol_type : null
		);

		$developers->setIdstates(
			isset(request->idstates) ? request->idstates : null
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

	public function getIdstates(): ?int {
		return $this->idstates;
	}

	public function setIdstates(?int $idstates): Developers {
		$this->idstates = $idstates;
		return $this;
	}

}