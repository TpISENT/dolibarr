<?php
/* Copyright (C) 2017-2018 Laurent Destailleur  <eldy@users.sourceforge.net>
 *
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program. If not, see <http://www.gnu.org/licenses/>.
* or see http://www.gnu.org/
*/

/**
 *	\file			htdocs/core/website.inc.php
 *  \brief			Common file loaded by all website pages (after master.inc.php). It set the new object $weblangs, using parameter 'l'.
 *  			    The global variable $websitekey must be defined.
 */

// Load website class
include_once DOL_DOCUMENT_ROOT.'/website/class/website.class.php';
// Define $website and $weblangs
if (! is_object($website))
{
	$website=new Website($db);
	$website->fetch(0,$websitekey);
}
if (! is_object($weblangs))
{
	$weblangs = dol_clone($langs);
}
if (GETPOST('l','aZ09')) $weblangs->setDefaultLang(GETPOST('l','aZ09'));
// Load websitepage class
include_once DOL_DOCUMENT_ROOT.'/website/class/websitepage.class.php';
