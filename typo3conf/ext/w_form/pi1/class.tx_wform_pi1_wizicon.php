<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Wolo Wolski <wolo.wolski@gmail.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * Class that adds the wizard icon.
 *
 * @author	Wolo Wolski <wolo.wolski@gmail.com>
 * @package	TYPO3
 * @subpackage	tx_wform
 */
class tx_wform_pi1_wizicon {

	/**
	 * Processing the wizard items array
	 *
	 * @param	array		$wizardItems: The wizard items
	 * @return	Modified array with wizard items
	 */
	function proc($wizardItems)	{
		global $LANG;

		$LL = $this->includeLocalLang();

		$wizardItems['plugins_tx_wform_pi1'] = array(
			'icon'=>\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('w_form').'pi1/ce_wiz.gif',
			'title'=>$LANG->getLLL('tx_wform.pi1_plus_wiz_title',$LL),
			'description'=>$LANG->getLLL('tx_wform.pi1_plus_wiz_description',$LL),
			'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=w_form_pi1'
		);

		return $wizardItems;
	}

	/**
	 * Reads the [extDir]/locallang.xml and returns the $LOCAL_LANG array found in that file.
	 *
	 * @return	The array with language labels
	 */
	function includeLocalLang()	{
		$llFile = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('w_form').'locallang_db.xml';
		$LOCAL_LANG = \TYPO3\CMS\Core\Utility\GeneralUtility::readLLfile($llFile, $GLOBALS['LANG']->lang);

		return $LOCAL_LANG;
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/w_form/pi1/class.tx_wform_pi1_wizicon.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/w_form/pi1/class.tx_wform_pi1_wizicon.php']);
}

?>