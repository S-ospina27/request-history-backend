<?php

namespace Database\Class;

class AssignmentRequirementsHasDevelopers implements \JsonSerializable {

	private ?int $idassignment_requirements = null;
	private ?int $iddevelopers = null;
	private ?string $assignment_requirements_has_developers_date = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): AssignmentRequirementsHasDevelopers {
		$assignmentrequirementshasdevelopers = new AssignmentRequirementsHasDevelopers();

		$assignmentrequirementshasdevelopers->setIdassignmentRequirements(
			isset(request->idassignment_requirements) ? request->idassignment_requirements : null
		);

		$assignmentrequirementshasdevelopers->setIddevelopers(
			isset(request->iddevelopers) ? request->iddevelopers : null
		);

		$assignmentrequirementshasdevelopers->setAssignmentRequirementsHasDevelopersDate(
			isset(request->assignment_requirements_has_developers_date) ? request->assignment_requirements_has_developers_date : null
		);

		return $assignmentrequirementshasdevelopers;
	}

	public function getIdassignmentRequirements(): ?int {
		return $this->idassignment_requirements;
	}

	public function setIdassignmentRequirements(?int $idassignment_requirements): AssignmentRequirementsHasDevelopers {
		$this->idassignment_requirements = $idassignment_requirements;
		return $this;
	}

	public function getIddevelopers(): ?int {
		return $this->iddevelopers;
	}

	public function setIddevelopers(?int $iddevelopers): AssignmentRequirementsHasDevelopers {
		$this->iddevelopers = $iddevelopers;
		return $this;
	}

	public function getAssignmentRequirementsHasDevelopersDate(): ?string {
		return $this->assignment_requirements_has_developers_date;
	}

	public function setAssignmentRequirementsHasDevelopersDate(?string $assignment_requirements_has_developers_date): AssignmentRequirementsHasDevelopers {
		$this->assignment_requirements_has_developers_date = $assignment_requirements_has_developers_date;
		return $this;
	}

}