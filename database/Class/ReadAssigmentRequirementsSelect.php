<?php

namespace Database\Class;

class ReadAssigmentRequirementsSelect implements \JsonSerializable {

	private ?int $idassignment_requirements = null;
	private ?int $idrequirements = null;
	private ?int $idstates = null;
	private ?string $states_name = null;
	private ?string $fullAsigments = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadAssigmentRequirementsSelect {
		$readassigmentrequirementsselect = new ReadAssigmentRequirementsSelect();

		$readassigmentrequirementsselect->setIdassignmentRequirements(
			isset(request->idassignment_requirements) ? request->idassignment_requirements : null
		);

		$readassigmentrequirementsselect->setIdrequirements(
			isset(request->idrequirements) ? request->idrequirements : null
		);

		$readassigmentrequirementsselect->setIdstates(
			isset(request->idstates) ? request->idstates : null
		);

		$readassigmentrequirementsselect->setStatesName(
			isset(request->states_name) ? request->states_name : null
		);

		$readassigmentrequirementsselect->setFullAsigments(
			isset(request->fullAsigments) ? request->fullAsigments : null
		);

		return $readassigmentrequirementsselect;
	}

	public function getIdassignmentRequirements(): ?int {
		return $this->idassignment_requirements;
	}

	public function setIdassignmentRequirements(?int $idassignment_requirements): ReadAssigmentRequirementsSelect {
		$this->idassignment_requirements = $idassignment_requirements;
		return $this;
	}

	public function getIdrequirements(): ?int {
		return $this->idrequirements;
	}

	public function setIdrequirements(?int $idrequirements): ReadAssigmentRequirementsSelect {
		$this->idrequirements = $idrequirements;
		return $this;
	}

	public function getIdstates(): ?int {
		return $this->idstates;
	}

	public function setIdstates(?int $idstates): ReadAssigmentRequirementsSelect {
		$this->idstates = $idstates;
		return $this;
	}

	public function getStatesName(): ?string {
		return $this->states_name;
	}

	public function setStatesName(?string $states_name): ReadAssigmentRequirementsSelect {
		$this->states_name = $states_name;
		return $this;
	}

	public function getFullAsigments(): ?string {
		return $this->fullAsigments;
	}

	public function setFullAsigments(?string $fullAsigments): ReadAssigmentRequirementsSelect {
		$this->fullAsigments = $fullAsigments;
		return $this;
	}

}