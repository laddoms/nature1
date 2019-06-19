<?php
			
			if($_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					if(isset($_FILES['image']))   ///check to see if reader uploaded something. REMEMBER TO USE $_FILES not $_POST!
						{	
							$allowed=array('image/jpg', 'image/JPG', 'image/PNG', 'image/png', 'image/jpeg', 'image/gif','image/JPEG',);  //the allowed file types
							if(in_array($_FILES['image']['type'], $allowed))  //validates file type
								{
									$username=$_POST['username'];
									$description=$_POST['description'];
									$activity=$_POST['activity'];
									$error=1;   //declare flag var now and set it to 1 meaning an error exists
									$getname='';  //intialize the var here so you dont get an undefined var error message

											////move it from the temp folder to the readers image folder

									if(move_uploaded_file($_FILES['image']['tmp_name'], "./images/shareimages/{$_FILES['image']['name']}"))  
										//../ brings file into the shareimage directory. 
										//Moves the file to the shareimages folder inside the images folder.
										{
											if($_FILES['image']['error']>0)  //check for error codes. A 0 error code indicates no error
												{
													echo'<p class="error">The file could not be uploaded. Please try again.</p>';
													$error=1;   ///flag as error
												}
											else
												{
													$filepath ="./images/shareimages/{$_FILES['image']['name']}"; 									
													$file=($_FILES['image']['name']);  //get the image file and store it in $file
													
													function fn_resize($image_resource_id,$width,$height) 
														{
															$target_width =300;  //the ultimate width in px of the newly stored image
															$target_height =300;  //the ultimate height in px of the newly stored image
															$target_layer=imagecreatetruecolor($target_width,$target_height);  //target layer is needed for the next line to form the image
															imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);  //takes the target layer, the resource id the ultimate width and height and the original width and height and builds a whole new image
															return $target_layer;
														}
													$source_properties = getimagesize($filepath);  //getimagesize returns 7 properties of the image. index 0 is width, 1 is height, 2 is type
																								//3 is height and width in string format. 
													$image_type = $source_properties[2]; //the 2 index in source properties is the type image from the getimagesize function
													if( $image_type == IMAGETYPE_JPEG ) //this creates the image, resizes it, and stores it in the readersimages folder
														{   
															$image_resource_id = imagecreatefromjpeg($filepath); //create an image and return an image identifier 
															$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);  //gets the target layer from the resize function
															imagejpeg($target_layer, $filepath );  //uses the target layer to create a new jpeg image and save it the original file name
														}
													elseif( $image_type == IMAGETYPE_GIF )  
														{  
															$image_resource_id = imagecreatefromgif($filepath);
															$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
															imagegif($target_layer, $filepath );
														}
													elseif( $image_type == IMAGETYPE_PNG ) 
														{
															$image_resource_id = imagecreatefrompng($filepath); 
															$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
															imagepng($target_layer, $filepath );
														}
													
     												?><script type="text/javascript">alert("Laurie, your share submission was successful!");</script>
													<?php
												}
											$filename=substr($file, 0,-4);  //the filename var is the name of the file minus the extension. This takes off the .jpg ext so .txt can be added below
											$textfile = "./images/shareimages/" . $filename . '.txt'; //The filename is the same as the image name + the extension .txt
											
											$datatowritetofile = "Submitted by: $username. $activity . $description ". PHP_EOL; 
												// Write the readers name, and content to the new file created for each image. 
												//Use PHP_EOL to get a newline in the file.
											
											file_put_contents($textfile, $datatowritetofile, FILE_APPEND);  //1st arg is the file name to write to. 
															//2nd arg is the data to be written. 3rd arg means append data to the bottom of the file
											$textfile=rename($textfile, $textfile);  //gets rid of any spaces in the textfile name so the textfile name will be the same as the imagefile name used in share pages. Used to read the file and load the figcaption
											//$filepath=strtolower($filepath);
											$filepath=rename($filepath, $filepath);
											header("Location:laurieform.php?content=success");
											exit();
										}
								}
							else  //if the file is not an approved image type
								{
									echo'<p class="error">Your share did not upload properly. Please upload a JPEG, jpg, jpeg, gif, or png type image.
										 Or check your file size. Maximum file size allowed is 500kb</p>';
										$error=1;  ///flag as error
								}
							if(file_exists($_FILES['image']['tmp_name']) && is_file($_FILES['image']['tmp_name']))  //make sure it exists and is a file not a folder
								{
									unlink($_FILES['image']['tmp_name']);  //delete the temp file
								}
							
						}
							
				}