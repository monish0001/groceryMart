<?php

class Form {

	private $startForm = '';
	private $elementForm = array();
	private $endForm = '';

	function startForm($action, $method, $extraParams = '') {

		$this->startForm = $this->startForm . "<form action='$action' method='$method' ";

		if (is_array($extraParams)) {

			foreach ($extraParams as $key => $value) {
				if ($key != 'header') {
					$this->startForm = $this->startForm . " $key = '$value' ";
				}

			}
		}

		$this->startForm = $this->startForm . ">";

		if (is_array($extraParams) && array_key_exists('header', $extraParams)) {
			$this->startForm = $this->startForm . $extraParams['header'] . "<br/>";
		}

	}

	function addItem($type, $name, $accessName, $extraParams = '') {

		if (!array_key_exists($accessName, $this->elementForm)) {
			$this->elementForm[$accessName] = '';
		}

		if ($type == "textarea") {
			$this->elementForm[$accessName] = $this->elementForm[$accessName] . "<textarea name='$name'";

			if (is_array($extraParams)) {
				foreach ($extraParams as $key => $value) {
					if ($key != 'value' && $key != 'div' && $key != 'label') {

						$this->elementForm[$accessName] = $this->elementForm[$accessName] . " $key = '$value' ";

					}
				}
			}

			$this->elementForm[$accessName] = $this->elementForm[$accessName] . ">";

			if (is_array($extraParams) && isset($extraParams['value'])) {
				$this->elementForm[$accessName] = $this->elementForm[$accessName] . $extraParams['value'];
			}

			$this->elementForm[$accessName] = $this->elementForm[$accessName] . "</textarea>";

			if (is_array($extraParams) && array_key_exists('label', $extraParams) && array_key_exists('id', $extraParams)) {
				$this->elementForm[$accessName] = $this->elementForm[$accessName] . '<label for="' . $extraParams['id'] . '">' . $extraParams['label'] . '</label>';
			}

			$this->elementForm[$accessName] = $this->elementForm[$accessName] . "<br/>";

		} elseif ($type == "select") {

			$this->elementForm[$accessName] = $this->elementForm[$accessName] . "<select name='$name'>";

			foreach ($extraParams['options'] as $key => $value) {

				$this->elementForm[$accessName] = $this->elementForm[$accessName] . "<option value='$value'>$value</option>";

			}

			$this->elementForm[$accessName] = $this->elementForm[$accessName] . "</select>";

		} else {
			$this->elementForm[$accessName] = $this->elementForm[$accessName] . "<input type='$type' name='$name' ";

			if (is_array($extraParams)) {
				foreach ($extraParams as $key => $value) {

					if ($key != 'div' && $key != 'label') {

						$this->elementForm[$accessName] = $this->elementForm[$accessName] . " $key = '$value' ";

					}
				}
			}

			$this->elementForm[$accessName] = $this->elementForm[$accessName] . "/>";
			if (is_array($extraParams) && array_key_exists('label', $extraParams) && array_key_exists('id', $extraParams)) {
				$this->elementForm[$accessName] = $this->elementForm[$accessName] . '<label for="' . $extraParams['id'] . '">' . $extraParams['label'] . '</label>';
			}
			$this->elementForm[$accessName] = $this->elementForm[$accessName] . "<br/>";
		}

	}

	function endForm($extraParams = '') {
		$this->endForm = $this->endForm . "</form>";
	}

	function displayForm() {
		echo $this->startForm;
		foreach ($this->elementForm as $key => $value) {
			# code...
			echo $value;
		}
		echo $this->endForm;
	}

	function getStart() {
		echo $this->startForm;
	}

	function getAllElements() {

		foreach ($this->elementForm as $key => $value) {
			# code...
			echo $value;
		}

	}

	function getElementByName($accessName) {

		echo $this->elementForm[$accessName];

	}

	function getEnd() {

		echo $this->endForm;

	}

}

?>