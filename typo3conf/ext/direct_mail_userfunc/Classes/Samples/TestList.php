<?php

/**
 * This is a sample class showing how to define a user function
 * returning a list of recipients. To use it, put 'user_testList->myRecipientList' as
 * itemsProcFunc value when creating a Recipient List of type "User function".
 *
 * @author      Xavier Perseguers <xavier@causal.ch>
 * @license     http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_DirectMailUserfunc_Samples_TestList {

	/**
	 * Returns a list of recipients.
	 *
	 * @param array $params User parameters
	 * @param tx_directmail_recipient_list|tx_directmail_dmail $pObj Parent object
	 * @return array
	 */
	public function myRecipientList(array &$params, $pObj) {
		// Add tt_address #4 to the recipient list
		$params['lists']['tt_address'][] = 4;

		// Add frontend user #1 to the recipient list
		$params['lists']['fe_users'][] = 1;

		// Retrieve user parameters
		$sizeOfRecipientList = $params['userParams'] ? $params['userParams'] : 2;
		for ($i = 0; $i < $sizeOfRecipientList; $i++) {
			$params['lists']['PLAINLIST'][] = array('name' => 'John Doo #' . $i, 'email' => 'john.doo-' . $i . '@hotmail.com');
		}
	}

	/**
	 * Returns a JavaScript wizard that lets user choose additional parameters to be passed
	 * during the itemsProcFunc call. The wizard should store any new parameters back to
	 * $PA[$'formName']['itemName'] upon closing and do not forget to call $PA['fieldChangeFunc']
	 * in order to tell TCEforms that the value is updated.
	 *
	 * @param string $methodName
	 * @param array $PA TCA configuration passed by reference
	 * @param t3lib_TCEforms|\TYPO3\CMS\Backend\Form\FormEngine $pObj Parent object
	 * @param boolean $autoJS Set to TRUE if you wish to fully generate your own code for calling your wizard
	 * @return string JavaScript code to be executed upon icon click
	 */
	public function getWizard($methodName, array &$PA, /* t3lib_TCEforms */ $pObj, &$autoJS) {
		$js = '';

		if ($methodName === 'myRecipientList') {
			$js = '
				var params = document.' . $PA['formName'] . '[\'' . $PA['itemName'] . '\'].value;
				if (empty(params)) params = 2;
			';

			// Show a standard javascript prompt and assign result to the parameters field
			// This information will be saved with form and available in myRecipientList
			$js .= '
				var r = prompt("How many items do you want in your list?", params);
				if (r != null) {
					document.' . $PA['formName'] . '[\'' . $PA['itemName'] . '\'].value = parseInt(r);'.
					implode('', $PA['fieldChangeFunc']) .';
				}
			';
		}

		return $js;
	}

}
