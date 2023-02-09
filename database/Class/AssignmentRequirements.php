<?php

namespace Database\Class;

class AssignmentRequirements implements \JsonSerializable {

	private ?int $idassignment_requirements = null;
	private ?int $idrequirements = null;
	private ?int $iddevelopers = null;
	private ?int $idstates = null;
	private ?string $assignment_requirements_date = null;
	private ?string $assignment_requirements_finish_date = null;
	private ?string $assignment_requirements_deadline = null;
	private ?string $assignment_requirements_overdue = null;
	private ?string $assignment_requirements_delay_time = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): AssignmentRequirements {
		$assignmentrequirements = new AssignmentRequirements();

		$assignmentrequirements->setIdassignmentRequirements(
			isset(request->idassignment_requirements) ? request->idassignment_requirements : null
		);

		$assignmentrequirements->setIdrequirements(
			isset(request->idrequirements) ? request->idrequirements : null
		);

		$assignmentrequirements->setIddevelopers(
			isset(request->iddevelopers) ? request->iddevelopers : null
		);

		$assignmentrequirements->setIdstates(
			isset(request->idstates) ? request->idstates : null
		);

		$assignmentrequirements->setAssignmentRequirementsDate(
			isset(request->assignment_requirements_date) ? request->assignment_requirements_date : null
		);

		$assignmentrequirements->setAssignmentRequirementsFinishDate(
			isset(request->assignment_requirements_finish_date) ? request->assignment_requirements_finish_date : null
		);

		$assignmentrequirements->setAssignmentRequirementsDeadline(
			isset(request->assignment_requirements_deadline) ? request->assignment_requirements_deadline : null
		);

		$assignmentrequirements->setAssignmentRequirementsOverdue(
			isset(request->assignment_requirements_overdue) ? request->assignment_requirements_overdue : null
		);

		$assignmentrequirements->setAssignmentRequirementsDelayTime(
			isset(request->assignment_requirements_delay_time) ? request->assignment_requirements_delay_time : null
		);

		return $assignmentrequirements;
	}

	public function getIdassignmentRequirements(): ?int {
		return $this->idassignment_requirements;
	}

	public function setIdassignmentRequirements(?int $idassignment_requirements): AssignmentRequirements {
		$this->idassignment_requirements = $idassignment_requirements;
		return $this;
	}

	public function getIdrequirements(): ?int {
		return $this->idrequirements;
	}

	public function setIdrequirements(?int $idrequirements): AssignmentRequirements {
		$this->idrequirements = $idrequirements;
		return $this;
	}

	public function getIddevelopers(): ?int {
		return $this->iddevelopers;
	}

	public function setIddevelopers(?int $iddevelopers): AssignmentRequirements {
		$this->iddevelopers = $iddevelopers;
		return $this;
	}

	public function getIdstates(): ?int {
		return $this->idstates;
	}

	public function setIdstates(?int $idstates): AssignmentRequirements {
		$this->idstates = $idstates;
		return $this;
	}

	public function getAssignmentRequirementsDate(): ?string {
		return $this->assignment_requirements_date;
	}

	public function setAssignmentRequirementsDate(?string $assignment_requirements_date): AssignmentRequirements {
		$this->assignment_requirements_date = $assignment_requirements_date;
		return $this;
	}

	public function getAssignmentRequirementsFinishDate(): ?string {
		return $this->assignment_requirements_finish_date;
	}

	public function setAssignmentRequirementsFinishDate(?string $assignment_requirements_finish_date): AssignmentRequirements {
		$this->assignment_requirements_finish_date = $assignment_requirements_finish_date;
		return $this;
	}

	public function getAssignmentRequirementsDeadline(): ?string {
		return $this->assignment_requirements_deadline;
	}

	public function setAssignmentRequirementsDeadline(?string $assignment_requirements_deadline): AssignmentRequirements {
		$this->assignment_requirements_deadline = $assignment_requirements_deadline;
		return $this;
	}

	public function getAssignmentRequirementsOverdue(): ?string {
		return $this->assignment_requirements_overdue;
	}

	public function setAssignmentRequirementsOverdue(?string $assignment_requirements_overdue): AssignmentRequirements {
		$this->assignment_requirements_overdue = $assignment_requirements_overdue;
		return $this;
	}

	public function getAssignmentRequirementsDelayTime(): ?string {
		return $this->assignment_requirements_delay_time;
	}

	public function setAssignmentRequirementsDelayTime(?string $assignment_requirements_delay_time): AssignmentRequirements {
		$this->assignment_requirements_delay_time = $assignment_requirements_delay_time;
		return $this;
	}

}