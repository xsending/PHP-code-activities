<html>
    <head>
        <h1> My Fruits </h1>
    </head>
    <body>
        <?php
            $fruits = array(
                array("Image" => '<br><img src="Banana.jpg" width= "235" height = "235">', 
                "Name" => "Banana", 
                "Description" => "Color Yellow", 
                "Facts" => "Bananas are a healthful addition to a balanced diet, as they provide a range of vital nutrients and are a good source of fiber."),
                array("Image" => '<br><img src="Watermelon.jpg" width= "235" height = "235">', 
                "Name" => "Watermelon", 
                "Description" => "Color Green with stripes of darker pigment", 
                "Facts" => "This large round fruit has a green rind and bright red flesh. It's also packed with nutrients, including antioxidants and vitamins A and C."),
                array("Image" => '<br><img src="Apple.jpg" width= "235" height = "235">', 
                "Name" => "Apple", 
                "Description" => "Color Red", 
                "Facts" => "Apples are high in fiber and water, two qualities that make them filling."),
                array("Image" => '<br><img src="Mango.jpg" width= "235" height = "235">', 
                "Name" => "Mango", 
                "Description" => "Color Yellow", 
                "Facts" => "Mangos are a good source of protective compounds with antioxidant properties, these plant chemicals include gallotannins and mangiferin."),
                array("Image" => '<br><img src="Pineapple.jpg" width= "235" height = "235">', 
                "Name" => "Pineapple", 
                "Description" => "Color Yellow", 
                "Facts" => "Pineapple and its compounds are linked to several health benefits, including improvements in digestion, immunity, and recovery from surgery."),
                array("Image" => '<br><img src="Blueberry.jpg" width= "235" height = "235">', 
                "Name" => "Blueberry", 
                "Description" => "Color Deep Purple", 
                "Facts" => "Blueberries are a healthy, stress-free food. They're also low in sodium and have virtually no fat."), 
                array("Image" => '<br><img src="Peach.jpg" width= "235" height = "235">', 
                "Name" => "Peach", 
                "Description" => "Color Pinkish Yellow", 
                "Facts" => "Peaches are low in calories (100 g just provide 39 calories), and contain no saturated fats."), 
                array("Image" => '<br><img src="Guava.jpg" width= "235" height = "235">', 
                "Name" => "Guava", 
                "Description" => "Color Green when ripe", 
                "Facts"=> "Eating more guavas may aid healthy bowel movements and prevent constipation."), 
                array("Image" => '<br><img src="Melon.jpg" width= "235" height = "235">', 
                "Name" => "Melon", 
                "Description" => "Color  can be Orange, Yellow, Red, Pink, or Green", 
                "Facts" => "Melons are low in sodium, and very low in saturated fat and cholesterol."),
                array("Image" => '<br><img src="Papaya.jpg" width= "235" height = "235">', 
                "Name" => "Papaya", 
                "Description" => "Color Green Yellowish and Orange", 
                "Facts" => "Papayas contain high levels of antioxidants vitamin A, vitamin C, and vitamin E.")
            );
            sort($fruits);
            foreach($fruits as $fruit){
                foreach($fruit as $key => $value){
                    echo "$key: $value <br>";
                }
                echo "<br><br><br><br><br><br>";
            }
        ?>        
    </body>

</html>