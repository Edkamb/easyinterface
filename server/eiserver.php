<?php header('Access-Control-Allow-Origin: *'); ?>

<? 

include "EIConfig.php";
include "misc.php";
include "EIRequest.php";
include "EIApps.php";
include "EIExamples.php";

println("<ei_response>");
try {
  println("<ei_server_output>");
  $request = new EIRequest();
  $response = $request->process();
  println("</ei_server_output>");
  $response = preg_replace("/(<\?xml)(.)*\?>/" , '', $response); // this should be fixed in another way
  println("<ei_app_output>");
  println( $response );
  println("</ei_app_output>");
} catch (Exception $e) {
  println("</ei_server_output>");
  print("<ei_error>");
  print( $e->getMessage() );
  println("</ei_error>");
}
println("</ei_response>");

?>
