<?php

namespace Database\Class;

class ReadCompanies implements \JsonSerializable {

	private ?int $idcompanies = null;
	private ?int $idroles = null;
	private ?int $idstates = null;
	private ?int $companies_nit = null;
	private ?string $companies_business_name = null;
	private ?string $companies_email = null;
	private ?string $companies_username = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): ReadCompanies {
		$readcompanies = new ReadCompanies();

		$readcompanies->setIdcompanies(
			isset(request->idcompanies) ? request->idcompanies : null
		);

		$readcompanies->setIdroles(
			isset(request->idroles) ? request->idroles : null
		);

		$readcompanies->setIdstates(
			isset(request->idstates) ? request->idstates : null
		);

		$readcompanies->setCompaniesNit(
			isset(request->companies_nit) ? request->companies_nit : null
		);

		$readcompanies->setCompaniesBusinessName(
			isset(request->companies_business_name) ? request->companies_business_name : null
		);

		$readcompanies->setCompaniesEmail(
			isset(request->companies_email) ? request->companies_email : null
		);

		$readcompanies->setCompaniesUsername(
			isset(request->companies_username) ? request->companies_username : null
		);

		return $readcompanies;
	}

	public function getIdcompanies(): ?int {
		return $this->idcompanies;
	}

	public function setIdcompanies(?int $idcompanies): ReadCompanies {
		$this->idcompanies = $idcompanies;
		return $this;
	}

	public function getIdroles(): ?int {
		return $this->idroles;
	}

	public function setIdroles(?int $idroles): ReadCompanies {
		$this->idroles = $idroles;
		return $this;
	}

	public function getIdstates(): ?int {
		return $this->idstates;
	}

	public function setIdstates(?int $idstates): ReadCompanies {
		$this->idstates = $idstates;
		return $this;
	}

	public function getCompaniesNit(): ?int {
		return $this->companies_nit;
	}

	public function setCompaniesNit(?int $companies_nit): ReadCompanies {
		$this->companies_nit = $companies_nit;
		return $this;
	}

	public function getCompaniesBusinessName(): ?string {
		return $this->companies_business_name;
	}

	public function setCompaniesBusinessName(?string $companies_business_name): ReadCompanies {
		$this->companies_business_name = $companies_business_name;
		return $this;
	}

	public function getCompaniesEmail(): ?string {
		return $this->companies_email;
	}

	public function setCompaniesEmail(?string $companies_email): ReadCompanies {
		$this->companies_email = $companies_email;
		return $this;
	}

	public function getCompaniesUsername(): ?string {
		return $this->companies_username;
	}

	public function setCompaniesUsername(?string $companies_username): ReadCompanies {
		$this->companies_username = $companies_username;
		return $this;
	}

}