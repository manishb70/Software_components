<?php

// session_start();
// $conn = new mysqli("localhost", "root", "Algo@123", "for_office");

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $user = "admin";
//     $currentDateTime = date('Y-m-d H:i:s');

//     $item_code = $_POST['item_name'];
//     $item_name = $_POST['item_name'];
//     $percentage = $_POST['percentage'];
//     $wharehouse_location = $_POST['wharehouse_'];
//     $revision = $_POST['revision'];
//     $products = $_POST['products'];
//     $organizin_mapping = $_POST['organizin_mapping'];

//     $sql = "INSERT INTO `bom_hedar_detail` (`item_name`, `percentage`, `wharehouse_`, `revision`, `products`, `organizin_mapping`, `created_by`) 
//             VALUES (?, ?, ?, ?, ?, ?, ?);";

//     $stmt = $conn->prepare($sql);
//     if ($stmt === false) {
//         die("Prepare failed: " . $conn->error);
//     }

//     $stmt->bind_param("sssssss", $item_name, $percentage, $wharehouse_location, $revision, $products, $organizin_mapping, $user);

//     if ($stmt->execute()) {
//         $product_id = $conn->insert_id;
//         echo json_encode(["status" => "success", "product_id" => $product_id]);
//     } else {
//         echo json_encode(["status" => "error", "message" => $stmt->error]);
//     }


//     $stmt->close();
// }


// $conn->close();
?>







<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- <script src="./js/jquery-3.7.1.min.js"></script> -->



    <title>Create BOM Form</title>
</head>

<body>
    <div id="create_section" class="mt-5 bg-gray-100 border border-gray-900 p-5 rounded-lg mx-5">
        <h1 class="text-center underline text-3xl mb-3 font-bold">Create BOM</h1>
        <form method="POST" class="w-full border border-gray-500 p-3 rounded-md" id="frmstore"
            enctype="multipart/form-data">
            <div class="flex">
                <div class="flex flex-wrap m-2 gap-10 ">
                    <div>
                        <label for="email"
                            class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Record
                            number :
                        </label>
                        <input id="header_id" type="text" name="header_id" value="" placeholder="Head id" disabled
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />


                    </div>

                    <div class="">
                        <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">item
                            name
                            : </label>
                        <input type="text" name="item_name" onchange="setBomImage()" id="item_name" required
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label
                            class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">revision
                            : </label>
                        <input type="text" name="revision" required
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                    </div>
                    <div class="">
                        <label
                            class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Percantage
                            :
                        </label>
                        <input type="text" name="percentage" required
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                    </div>
                    <div class="">
                        <label
                            class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Products
                            : </label>
                        <input type="text" name="products" required
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label
                            class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Organisation
                            mapping :
                        </label>
                        <input type="text" required name="organizin_mapping"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />


                    </div>
                    <div class="">
                        <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                            Upload image :
                        </label>
                        <input type="file" name="bomMainImg"  required id="uploadImageItem" onchange="setUploadedImage (event)"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3  text-[#6B7280]  outline-none focus:border-[#6A64F1] focus:shadow-md" />


                    </div>
                    <div class="">
                        <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Ware
                            house location : </label>
                        <input type="text" required name="wharehouse_"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <button type="submit"
                        class="w-20  h-10 bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 whitespace-nowrap font-medium text-white  rounded-md  py-2 text-center me-2 mb-2 mt-4  dark:border-blue-500 dark:text-blue-500 hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">
                        Submit</button>
                </div>




                <div class="flex border-2 flex-wrap m-2 gap-20">

                    <img src="" name="bomMainImg" id="bomMainImg" alt="please uplaod" width="300px">

                </div>

            </div>
        </form>

        <?php

        if (isset($_POST)) {

            ?>
            <form action="" id="bomLinelevel">
                <div class="mt-6">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full mx-auto divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    S.no</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    Process Seq</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    Item Code</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Item Name</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Qty</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Percentage</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200" id="poCreteTbody">
                                            <tr class="hover:bg-gray-600">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" value="1"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="process_seq"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Process Seq">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="item_code"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Item code">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="item_name" 
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Item name">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="number" name="quantity"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Quantity">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="number" name="percentage_line"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Percentage">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <a href="#_" onclick="addRowItem()"
                                        class="relative inline-block px-4 py-2 font-medium group">
                                        <span
                                            class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                                        <span
                                            class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                                        <span class="relative text-black group-hover:text-white">+ Add item</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-5 flex flex-wrap justify-around">
                        <button type="reset"
                            class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Clear
                            Form</button>
                        <!--  -->
                        <button type="button" onclick="createdBomb()" id="po-save-btn"
                            class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </div>
            </form>



            <!-- this button is for create direct po fressh inert query -->

            <?php if (isset($po_number)) {

                ?>

                <button type="text" onclick="purchaseOrderDirect()" id="po-submit-btn"
                    class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">


                    Submit</button>


                <?php

            } ?>

        </div>
    <?php } ?>



    </div>
</body>





<script>









    const addRowItem = () => {


        let total = document.getElementById("poCreteTbody").querySelectorAll("tr").length


        total++

        let tr = document.createElement("tr")
        tr.classList.add("hover:bg-gray-600")

        tr.innerHTML = `       
                                       
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                <input type="txt" id="input-email-label"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    value=${total}
                                                    placeholder=1 disabled>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                <input type="txt" id="input-email-label" name="process_seq"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    placeholder="Process Seq">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                <input type="txt" id="input-email-label" name="item_code"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    placeholder="Item code">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                <input type="txt" id="input-email-label"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    name="item_name" placeholder="Item name">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                <input type="number" id="input-email-label" name="quantity"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                     placeholder="quantity">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                <input type="number" id="input-email-label" name="percentage_line" 
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    placeholder="percentage">
                                            </td>
                                     

                                    
                                    

                                    `


        $("#poCreteTbody").append(tr)



    }












</script>



<!-- <script src="./jquery.min.js"></script> -->
<script src="./bom.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- <script src="./js/jquery-3.7.1.min.js"></script> -->

<script>
    $(function () {

        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];


        console.log(availableTags);
        $.get("ajax.php", {
            "itemCodeInfoForPr": "itemCodeInfoForPr"
        }, function (data) {

            availableTags = JSON.parse(data);

            console.log(availableTags);
            $("input[name='item_name']").autocomplete({
                source: availableTags
            });




            $("input[name='Item_name']").autocomplete({
                source: availableTags
            });


            $("input[name='item_code']").autocomplete({
                source: availableTags
            });


        })

    });
</script>


<script>





    function setUploadedImage(event) {




        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imagePreview = document.getElementById('bomMainImg');
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            alert('Please select a valid image file.');
        }





    }



    const setBomImage = () => {





        console.log("image selected");



        // let item_code = $("#item_name").val()


        // let data = {
        //     item_code: item_code,
        //     getImgName: "getImgName"

        // }

        // $.get("ajax.php", data, function (data) {

        //     console.log(data);




        //     if(data.success){




        //         $("#bomMainImg").attr("src", `images/${data.imgpath}`);



        //     }




        // },"JSON").fail(error=>{
        //     console.log(error.responseText);
        // })
















    }

    $(document).ready(function () {
        // $('#frmstore').submit(function (e) {
        //     e.preventDefault();

        //      var frmData = new FormData(this);


        //      keys = Object.keys(frmData);


        //      console.log(keys);

        //     frmData += "&createBomHead=createBomHead";



        //         console.log(frmData);




        //     $.post("bomAjax.php", frmData, function (response) {
        //         console.log("This is from success block");
        //         console.log(response);
        //         console.log(response.message);

        //         if (response) {
        //             // let inserted_id = response.Record_no; // Use inserted_id instead of header_id
        //             console.log(response.Record_no);

        //             $("#header_id").val(response.Record_no); // Set the value to response.Record_no


        //             alert("Form submitted successfully! Your Record No is " + response.Record_no);

        //             // Reset form on success
        //         } else {
        //             alert("Error: " + response.message); // Show specific error message
        //         }
        //     }, "JSON").fail(function (jqXHR, textStatus, errorThrown) {
        //         console.log("This is the error block");
        //         console.error("Error details:", textStatus, errorThrown);
        //         alert("An error occurred: " + textStatus);
        //     });
        //     $('#frmstore')[0].reset();
        // });
        $('#frmstore').submit( async function (e) {

            
            

            e.preventDefault(); // Prevent the default form submission
            
            var frmData = new FormData(this); // Create FormData object from the form
            
            
            
            let filename="" ;
            
           await  $.ajax({
                url: 'upload.php', // PHP file to handle upload
                type: 'POST',
                data: frmData,
                contentType: false,
                processData: false,
                success: function (response) {

                    // console.log(response)
                    
                    if(response.status){
                        console.log(response)
                                console.log("response file name is "+ response.filename);
                                
                               
                        filename = response.filename;
                        
                        
                    }else{
                        alert("Error: "); // Show specific error message
                        return alert("Error: Something wrong "); // Show specific error message
                    }    
                    
                    
                    
                    
                    
                },
                error: function (error) {
                    // console.log(error.responseText);
                }
            });
            
            console.log("File name is"+filename);
            
            // Append additional data to FormData
            
            // Append additional data to FormData
            frmData.append("createBomHead", "createBomHead");

            console.log(filename)

            frmData.append("filename", filename);

            // Logging FormData for debugging


            // Send the FormData using $.ajax













               await $.ajax({
                url: "bomAjax.php", // URL to send the request to
                type: "POST", // HTTP method
                dataType: "json", // Expected response format
                data: frmData, // Form data
                contentType: false, // Important for FormData
                processData: false, // Important for FormData
                success: function (response) {
                    console.log("This is from the success block");
                    console.log(response);

                    if (response && response.Record_no) {
                        console.log(response.Record_no);
                        $("#header_id").val(response.Record_no); // Set the value to response.Record_no
                            
                   



                        alert("Form submitted successfully! Your Record No is " + response.Record_no);

                        // Optionally reset the form here if needed
                        // $('#frmstore')[0].reset();
                    } else {
                        alert("Error: " + response.message); // Show specific error message
                    }
                },
                error: function (error) {
                    console.log(error.responseText); //
                     
                    alert("An error occurred: "); // Alert the user
                }
            });
        });

    });





    $(document).ready(function () {
        $('#bomLinelevel').submit(function (e) {
            e.preventDefault();
            var frmData = $(this).serialize();

            $.post("bomAjax.php", frmData, function (response) {
                console.log("This is from success block");
                console.log(response);
                console.log(response.message);

                if (response) {
                    // let inserted_id = response.Record_no; // Use inserted_id instead of header_id
                    //console.log(response.Record_no);

                    // $("#header_id").val(response.Record_no); // Set the value to response.Record_no


                    alert("Form submitted successfully! Your Record No is " + response.Record_no);

                    // Reset form on success
                } else {
                    alert("Error: " + response.message); // Show specific error message
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log("This is the error block");
                console.error("Error details:", textStatus, errorThrown);
                alert("An error occurred: " + textStatus);
            });
            $('#bomLinelevel')[0].reset();
        });
    });

</script>


</html>