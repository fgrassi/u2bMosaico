<head>
        <title>U2BMosaico</title>
</head>


<body>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .parent {
            display: flex;
            height: 100%;
            background-color: lightgray;
            flex-wrap: wrap;
            align-content: center;
            gap: 15px;
            /* Or whatever */
        }

        .child {
            width: 560px;
            /* Or whatever */
            height: 310px;
            /* Or whatever */
            margin: auto;
            /* Magic! */
            background-color: lightgreen;
        }
    </style>

    <div class="comando">
        <input type="text" id="minhaUrl"  style="width: 350px;"/>
        <span class="material-icons" onclick="novaJanela()" style="cursor: pointer;">
            add_circle
        </span>
    </div>
    <div class="parent">
    </div>

    <script>
        function novaJanela() {

            var $url = $("#minhaUrl").val();

            console.log(youtube_parser($url));
            var $iFrame = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' + youtube_parser($url) + '" title="U2BMosaico" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            var $newDiv = $("<div/>") // creates a div element
                .attr("id", "someID") // adds the id
                .addClass("child") // add a class
                .html($iFrame);

            $(".parent").append($newDiv);
            $("#minhaUrl").val('');

        }

        function youtube_parser(url) {
            var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
            var match = url.match(regExp);
            return (match && match[7].length == 11) ? match[7] : false;
        }
    </script>

</body>
