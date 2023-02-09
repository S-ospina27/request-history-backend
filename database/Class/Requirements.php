<?php

namespace Database\Class;

class Requirements implements \JsonSerializable {

	private ?int $idrequirements = null;
	private ?int $idcompanies = null;
	private ?string $requirements_name = null;
	private ?string $requirements_priority = null;
	private ?string $requirements_description = null;
	private ?int $idstates = null;
	private ?string $requirements_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Requirements {
		$requirements = new Requirements();

		$requirements->setIdrequirements(
			isset(request->idrequirements) ? request->idrequirements : null
		);

		$requirements->setIdcompanies(
			isset(request->idcompanies) ? request->idcompanies : null
		);

		$requirements->setRequirementsName(
			isset(request->requirements_name) ? request->requirements_name : null
		);

		$requirements->setRequirementsPriority(
			isset(request->requirements_priority) ? request->requirements_priority : null
		);

		$requirements->setRequirementsDescription(
			isset(request->requirements_description) ? request->requirements_description : null
		);

		$requirements->setIdstates(
			isset(request->idstates) ? request->idstates : null
		);

		$requirements->setRequirementsDate(
			isset(request->requirements_date) ? request->requirements_date : null
		);

		return $requirements;
	}

	public function getIdrequirements(): ?int {
		return $this->idrequirements;
	}

	public function setIdrequirements(?int $idrequirements): Requirements {
		$this->idrequirements = $idrequirements;
		return $this;
	}

	public function getIdcompanies(): ?int {
		return $this->idcompanies;
	}

	public function setIdcompanies(?int $idcompanies): Requirements {
		$this->idcompanies = $idcompanies;
		return $this;
	}

	public function getRequirementsName(): ?string {
		return $this->requirements_name;
	}

	public function setRequirementsName(?string $requirements_name): Requirements {
		$this->requirements_name = $requirements_name;
		return $this;
	}

	public function getRequirementsPriority(): ?string {
		return $this->requirements_priority;
	}

	public function setRequirementsPriority(?string $requirements_priority): Requirements {
		$this->requirements_priority = $requirements_priority;
		return $this;
	}

	public function getRequirementsDescription(): ?string {
		return $this->requirements_description;
	}

	public function setRequirementsDescription(?string $requirements_description): Requirements {
		$this->requirements_description = $requirements_description;
		return $this;
	}

	public function getIdstates(): ?int {
		return $this->idstates;
	}

	public function setIdstates(?int $idstates): Requirements {
		$this->idstates = $idstates;
		return $this;
	}

	public function getRequirementsDate(): ?string {
		return $this->requirements_date;
	}

	public function setRequirementsDate(?string $requirements_date): Requirements {
		$this->requirements_date = $requirements_date;
		return $this;
	}

}