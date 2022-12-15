<body>
    <div class='center'>
                    <from action="/email2" method="post">
                        @csrf
                        <input type="hidden" name"_token" value="{{ csrf_token()}}">

                        <div class="form-group">
                            <lable for="">Name</lable>
                            <input type="text"class="form-cintrol"name="name">
                        </div>
                        <div class="form-group">
                            <lable for="">E-Mail</lable>
                            <input type="email"class="form-cintrol"name="email">
                        </div>
                        <div class="form-group">
                            <lable for="">Subject</lable>
                            <input type="text"class="form-cintrol"name="subject">
                        </div>
                        <div class="form-group">
                            <lable for="">Message</lable>
                            <textarea name="message" class="form-control" cols="30" rows="6"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Send</button>

                    </from>

        </div>
    </div>
