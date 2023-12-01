<?php

/* The assignment is to modify the pseudo code below. 
 * 
 * Currently the HTML-output of the code is:
 * # <ol>
 * #     <li>Konferencer: Årsmøde i turistforeningen (20. oktober 2021)</li>
 * #     <li>Fyraftensmøder: Den gode velkomst (19. september 2021)</li>
 * #     <li>Konferencer: Møder i en post-corona verden (1. november 2021)</li>
 * #     <li>Webinarer: Effektivitetsworkshop (1. november 2021)</li>
 * #     <li>Fyraftensmøder: Boost din bundlinje (2. december 2021)</li>
 * # </ol>
 * 
 * The objectives of the modifications, is for the code to obtain the following:
 * - The events should be logically grouped into their respective categories
 * - The categories should be listed alphabetically by category title
 * - For each category the output should contain a list of the category events
 * - The events within a category should be ordered by event start_date
 * 
 * A template for the output may look like this:
 * # <ol>
 * #    <li>CATEGORY-NAME:</li>
 * #    <ol>
 * #        <li>EVENT-NAME (START-DATE)</li>
 * #        <li>...</li>
 * #    </ol>
 * #    <li>...</li>
 * # </ol>
 * 
 * NOTICE: The code doesn't actually work. You shall modify the code by continuing with pseudo code.
 * 
 */

class Event {
    public $id;
    public $category_id;
    public $title;
    public $start_date;
    public $location;
}

class Category {
    public $id;
    public $title;
    public $type;

    public function getEvents() {
        /*
         * We pretend that this code gives us an array of working Event objects, also
         * neglecting the n+1 problem this approach produces. Ideally the event data
         * would be a single query containing all applicable category_ids, and
         * not called for each category individually.
         */
        $db_connection = new DatabaseConnection();
        $sql = sprintf("SELECT * FROM events WHERE category_id = %d ORDER BY start_date", $this->id);

        /* Keeping our mind in the pseudo spirit, we assume this method gives us an array of event objects */
        return $db_connection->get_rows_as_objects($sql);
    }
}

/* We pretend that this code gives us a working array of Category objects */
$db_connection = new DatabaseConnection();
$sql = "SELECT * FROM categories ORDER BY title";

$categories = $db_connection->get_rows_as_objects($sql);

/* Prepare the HTML output. Mind that we are not using a templating engine */
echo sprintf("<ol>\n");

/** @var Category $category */
foreach ($categories as $category) {
    echo sprintf("\t<li>%s</li>\n", $category->title);
    echo sprintf("\t<ol>\n");

    /** @var Event $event */
    foreach ($category->getEvents() as $event) {
        echo sprintf("\t\t<li>%s (%s)</li>\n", $event->title, $event->start_date);
    }

    echo sprintf("\t</ol>\n");
}

echo sprintf("</ol>\n");
