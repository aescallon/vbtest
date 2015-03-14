<!DOCTYPE html>
<!--
Creado por: Antonio Escallón | aescallon@gmail.com
Fecha creación: 14/03/2015, 10:50 AM
Fecha modificación: 14/03/2015
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>VB Test</title>
        <script src="lib/jquery-2.1.1.min.js"></script>

    </head>
    <body>
        <h1>VB Test</h1>
        <h2>Original Text from KumbiaPHP issues repo</h2>
        <p id="text">[Text]</p>
        <h2>Script and audio file from  Voice Bunny</h2>
        <p id="script">[Script]</p>
        <p id="audio">[Audio URL]</p>
        <?php
        ?>
        <script>
                    var kumbiaIssue = '';
                    $.ajax({
                    url: "https://api.github.com/repos/KumbiaPHP/KumbiaPHP/issues",
                            type: "GET",
                            jsonp: "callback",
                            dataType: "jsonp",
                            success: function(data1) {
                            kumbiaIssue = data1.data[0].body;
                                    $('#text').html(kumbiaIssue);
                                    $.ajax({
                                    url: "https://45663:7a23f7cc78b4c2839f19c106994c5fea@api.voicebunny.com/projects/addSpeedy?test=1&title=Kumbia Issues on Git&script=" + kumbiaIssue,
                                            type: "POST",
                                            jsonp: "callback",
                                            dataType: "jsonp",
                                            success: function(data2) {
                                            $('#script').html(data2.project.script.part001);
                                                    audioUrl = data2.project.reads[0].urls.part001.default;
                                                    $('#audio').html("<audio controls><source src="+audioUrl+" type='audio/mpeg'>Your browser does not support the audio element.</audio>");
                                      }
                                      });
                                      }
                              });

        </script>

    </body>
</html>
