<?php

//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
/// Read the Disclaimer provided at www.plus2net.com

//*****************************************

require "connect.php"; // database connection details
echo "

function fillCategory(){
 // this function is used to fill the category list on load

";

$q1=mysql_query("select * from product_group order by product_group_name asc");
//echo mysql_error();
while($nt1=mysql_fetch_array($q1)){

	echo "addOption(document.drop_list.group_category, '$nt1[product_group_id]', '$nt1[product_group_name]');";
}// end of while
?>
} // end of JS function fillCategory

function SelectSubCat(){
// ON or after selection of category this function will work

removeAllOptions(document.drop_list.sub_category);
addOption(document.drop_list.sub_category, "", "เลือกหมวดหมู่ย่อย", "required");


// Collect all element of subcategory for various cat_id

<?
// let us collect all cat_id and then collect all subcategory for each cat_id
$q2=mysql_query("select distinct(product_group) from product_sub order by product_sub_name asc");
// In the above query you can collect cat_id from category table also.
while($nt2=mysql_fetch_array($q2)){
//echo "$nt2[cat_id]";
echo "if(document.drop_list.group_category.value == '$nt2[product_group]'){";
$q3=mysql_query("select product_sub_name,product_sub_id from product_sub where product_group='$nt2[product_group]'");
while($nt3=mysql_fetch_array($q3)){
echo "addOption(document.drop_list.sub_category,'$nt3[product_sub_id]', '$nt3[product_sub_name]');";


} // end of while loop
echo "}"; // end of JS if condition SelectSubCat

}
?>
}

function SelectSubCatmodel(){
// ON or after selection of category this function will work


removeAllOptions(document.drop_list.model_car);
addOption(document.drop_list.model_car, "", "เลือกรุ่นย่อย", "");

// Collect all element of subcategory for various cat_id

<?
// let us collect all cat_id and then collect all subcategory for each cat_id
$q4=mysql_query("select distinct(sub_id) from model_car order by model_name asc");
// In the above query you can collect cat_id from category table also.
while($nt4=mysql_fetch_array($q4)){
//echo "$nt2[cat_id]";
echo "if(document.drop_list.sub_category.value == '$nt4[sub_id]'){";
$q5=mysql_query("select model_name,model_id from model_car where sub_id='$nt4[sub_id]'");
while($nt5=mysql_fetch_array($q5)){
echo "addOption(document.drop_list.model_car,'$nt5[model_id]', '$nt5[model_name]');";


} // end of while loop
echo "}"; // end of JS if condition SelectSubCat2

}
?>



}
//////////////////

function removeAllOptions(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
}


function addOption(selectbox, value, text )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;

	selectbox.options.add(optn);
}
