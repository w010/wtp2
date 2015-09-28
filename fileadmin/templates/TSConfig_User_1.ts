#
# settings for Default Domain beusergroup


setup.override.edit_wideDocument = 1
setup.override.navFrameResizable = 1
setup.default.navFrameWidth = 300
setup.default.thumbnailsByDefault = 1

options.pageTree.showDomainNameWithTitle = 1
options.pageTree.showNavTitle = 1
options.pageTree.hideFilter = 0

options.clearCache.system = 1
options.clearCache.all = 1



mod.web_list {
   clickTitleMode = edit
   alternateBgColors = 1
   hideTables = static_template,static_currencies,static_taxes,static_markets,static_countries
}

# By default almost all new contents hidden
TCAdefaults {
	#pages.hidden = 1
	#tt_content.hidden = 1
	#tt_news.hidden = 1
	#tt_news_cat.hidden = 1
}



permissions.file.default {
	addFile = 1
	readFile = 1
	editFile = 1
	writeFile = 1
	uploadFile = 1
	copyFile = 1
	moveFile = 1
	renameFile = 1
	unzipFile = 1
	deleteFile = 1

	addFolder = 1
	readFolder = 1
	moveFolder = 1
	writeFolder = 1
	renameFolder = 1
	deleteFolder = 1
	deleteSubfolders = 1
}

tx_directmail	{
	hideSteps = cat
}
