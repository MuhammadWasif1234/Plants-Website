<?php
include "../config.php";
                                                if(isset($_POST["btn"])){
                                                    $rating=0;
                                                    $name = $_POST["name"];
                                                    $id = $_POST["id"];
                                                    $reason = $_POST["reason"];
                                                    $comment = $_POST["comment"];
                                                    
                                                                                  
                                                    $insert_query = mysqli_query($conn,"INSERT INTO `reviews`( `rw_rating`, `rw_comments`, `p_id`, `Reason`, `Nickname`) VALUES ($rating,'$comment','$id','$reason','$name')");
                                                    if ($insert_query) {
                                                        ?>
                                                            <script>
                                                                alert("Review Added");
                                                                window.location.href="shop-details.php?id=<?php echo $id?>";
                                                                
                                                            </script>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <script>
                                                            alert("<?php echo mysqli_error($conn); ?>");
                                                            
                                                        </script>

                                                    <?php
                                                    }
                                                    
                                                }
                                        ?>