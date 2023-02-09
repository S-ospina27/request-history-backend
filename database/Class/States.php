<?php

namespace Database\Class;

class States implements \JsonSerializable {

	private ?int $idstates = null;
	private ?string $states_name = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): States {
		$states = new States();

		$states->setIdstates(
			isset(request->idstates) ? request->idstates : null
		);

		$states->setStatesName(
			isset(request->states_name) ? request->states_name : null
		);

		return $states;
	}

	public function getIdstates(): ?int {
		return $this->idstates;
	}

	public function setIdstates(?int $idstates): States {
		$this->idstates = $idstates;
		return $this;
	}

	public function getStatesName(): ?string {
		return $this->states_name;
	}

	public function setStatesName(?string $states_name): States {
		$this->states_name = $states_name;
		return $this;
	}

}