<div class="container section_padding large_line_height">
    <section id="team">
        <div class="row">
            <div class="col-md-8 p-t-5 p-l-7 p-b-2 p-r-4">
                <?php
                    $a = new Area('Team Overview');
                    $a->display($c);
                ?>
            </div>
            <div class="col-md-4 p-l-6 p-r-10 p-t-2 p-b-6">
                <?php
                    $a = new Area('Team Blurb');
                    $a->display($c);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <?php
                    $a = new Area('About Our Team');
                    $a->display($c);
                ?>
            </div>
        </div>
    </section>
</div>
