<?php

namespace Database\Class;

class Companies implements \JsonSerializable {

	private ?int $idcompanies = null;
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

	public static function formFields(): Companies {
		$companies = new Companies();

		$companies->setIdcompanies(
			isset(request->idcompanies) ? request->idcompanies : null
		);

		$companies->setIdstates(
			isset(request->idstates) ? request->idstates : null
		);

		$companies->setCompaniesNit(
			isset(request->companies_nit) ? request->companies_nit : null
		);

		$companies->setCompaniesBusinessName(
			isset(request->companies_business_name) ? request->companies_business_name : null
		);

		$companies->setCompaniesEmail(
			isset(request->companies_email) ? request->companies_email : null
		);

		$companies->setCompaniesUsername(
			isset(request->companies_username) ? request->companies_username : null
		);

		return $companies;
	}

	public function getIdcompanies(): ?int {
		return $this->idcompanies;
	}

	public function setIdcompanies(?int $idcompanies): Companies {
		$this->idcompanies = $idcompanies;
		return $this;
	}

	public function getIdstates(): ?int {
		return $this->idstates;
	}

	public function setIdstates(?int $idstates): Companies {
		$this->idstates = $idstates;
		return $this;
	}

	public function getCompaniesNit(): ?int {
		return $this->companies_nit;
	}

	public function setCompaniesNit(?int $companies_nit): Companies {
		$this->companies_nit = $companies_nit;
		return $this;
	}

	public function getCompaniesBusinessName(): ?string {
		return $this->companies_business_name;
	}

	public function setCompaniesBusinessName(?string $companies_business_name): Companies {
		$this->companies_business_name = $companies_business_name;
		return $this;
	}

	public function getCompaniesEmail(): ?string {
		return $this->companies_email;
	}

	public function setCompaniesEmail(?string $companies_email): Companies {
		$this->companies_email = $companies_email;
		return $this;
	}

	public function getCompaniesUsername(): ?string {
		return $this->companies_username;
	}

	public function setCompaniesUsername(?string $companies_username): Companies {
		$this->companies_username = $companies_username;
		return $this;
	}

}