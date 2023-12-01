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
    
    public function getCategory() {
        /* We pretend that this code gives us a working Category-object */
        $sql = sprintf("SELECT * FROM categories WHERE id = %d",
                       $this->category_id);
        $db_connection = new DatabaseConnection();
        $category = $db_connection->get_row_as_object($sql);
        return $category;
    }
}

class Category {
    public $id;
    public $title;
    public $type;
}

/* We pretend that this code gives us a working array of Event-objects */
$sql = "SELECT * FROM events ORDER BY id";
$db_connection = new DatabaseConnection();
$events = $db_connection->get_rows_as_objects($sql);

/* Print basic html list of events */
echo "<ol>\n";
/* @var $event Event */
foreach($events as $event) {
    echo "    <li>{$event->getCategory()->title}: {$event->title} ({$event->start_date})</li>\n";
}
echo "</ol>\n";
