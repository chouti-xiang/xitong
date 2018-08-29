/*********************************************************
 Software Develop & design Tools System file
 VINER V 1.0.00 - New Project
 Copyright 2001-20003 www.Viner.com
 **********************************************************/
function setselevalue(seleobj,val)
{

	len = seleobj.options.length;
	for (i=0; i < len ;i++)
	{
		svalue = seleobj.options[i].value;
		if (val == svalue) {seleobj.options[i].selected = true;break;}
	}
}



function Checkselevalue(theform,thefield,thevalue)
{
	for (i=0;i<theform.length;i++)	
	{
			if (theform.item(i).type=="radio")
			{
				if (theform.item(i).name==thefield)	
				{
					if (theform.item(i).value==thevalue)	
					{
							theform.item(i).checked=true;
					}
					else
					{
							theform.item(i).checked=false;	
					}
				}
			}
	}
}