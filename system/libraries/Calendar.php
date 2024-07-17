<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Calendar Class
 *
 * This class enables the creation of calendars
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/calendar.html
 */
class CI_Calendar {

	var $CI;
	var $lang;
	var $local_time;
	var $template		= '';
	var $start_day		= 'sunday';
	var $month_type		= 'long';
	var $day_type		= 'abr';
	var $show_next_prev	= FALSE;
	var $next_prev_url	= '';
	var $translated_day_names = array();
 	var $translated_month_names = array();

	/**
	 * Constructor
	 *
	 * Loads the calendar language file and sets the default time reference
	 */
	public function __construct($config = array())
	{
		$this->CI =& get_instance();
		
		$this->CI->load->library('Nepali_calendar');

		if ( ! in_array('calendar_lang.php', $this->CI->lang->is_loaded, TRUE))
		{
			$this->CI->lang->load('calendar');
		}

		$this->local_time = time();

		if (count($config) > 0)
		{
			$this->initialize($config);
			if( $config['translated_month_names'] ){
			  $this->translated_month_names = $config['translated_month_names'];
			}
			if( $config['translated_day_names'] ){
			  $this->translated_day_names = $config['translated_day_names'];
			}
		}

		log_message('debug', "Calendar Class Initialized");
	}

	// --------------------------------------------------------------------
    // custome
    private $bs = array(
			2000=>array(2000,30,32,31,32,31,30,30,30,29,30,29,31),
			2001=>array(2001,31,31,32,31,31,31,30,29,30,29,30,30),
			2002=>array(2002,31,31,32,32,31,30,30,29,30,29,30,30),
			2003=>array(2003,31,32,31,32,31,30,30,30,29,29,30,31),
			2004=>array(2004,30,32,31,32,31,30,30,30,29,30,29,31),
			2005=>array(2005,31,31,32,31,31,31,30,29,30,29,30,30),
			2006=>array(2006,31,31,32,32,31,30,30,29,30,29,30,30),
			2007=>array(2007,31,32,31,32,31,30,30,30,29,29,30,31),
			2008=>array(2008,31,31,31,32,31,31,29,30,30,29,29,31),
			2009=>array(2009,31,31,32,31,31,31,30,29,30,29,30,30),
			2010=>array(2010,31,31,32,32,31,30,30,29,30,29,30,30),
			2011=>array(2011,31,32,31,32,31,30,30,30,29,29,30,31),
			2012=>array(2012,31,31,31,32,31,31,29,30,30,29,30,30),
			2013=>array(2013,31,31,32,31,31,31,30,29,30,29,30,30),
			2014=>array(2014,31,31,32,32,31,30,30,29,30,29,30,30),
			2015=>array(2015,31,32,31,32,31,30,30,30,29,29,30,31),
			2016=>array(2016,31,31,31,32,31,31,29,30,30,29,30,30),
			2017=>array(2017,31,31,32,31,31,31,30,29,30,29,30,30),
			2018=>array(2018,31,32,31,32,31,30,30,29,30,29,30,30),
			2019=>array(2019,31,32,31,32,31,30,30,30,29,30,29,31),
			2020=>array(2020,31,31,31,32,31,31,30,29,30,29,30,30),
			2021=>array(2021,31,31,32,31,31,31,30,29,30,29,30,30),
			2022=>array(2022,31,32,31,32,31,30,30,30,29,29,30,30),
			2023=>array(2023,31,32,31,32,31,30,30,30,29,30,29,31),
			2024=>array(2024,31,31,31,32,31,31,30,29,30,29,30,30),
			2025=>array(2025,31,31,32,31,31,31,30,29,30,29,30,30),
			2026=>array(2026,31,32,31,32,31,30,30,30,29,29,30,31),
			2027=>array(2027,30,32,31,32,31,30,30,30,29,30,29,31),
			2028=>array(2028,31,31,32,31,31,31,30,29,30,29,30,30),
			2029=>array(2029,31,31,32,31,32,30,30,29,30,29,30,30),
			2030=>array(2030,31,32,31,32,31,30,30,30,29,29,30,31),
			2031=>array(2031,30,32,31,32,31,30,30,30,29,30,29,31),
			2032=>array(2032,31,31,32,31,31,31,30,29,30,29,30,30),
			2033=>array(2033,31,31,32,32,31,30,30,29,30,29,30,30),
			2034=>array(2034,31,32,31,32,31,30,30,30,29,29,30,31), 
			2035=>array(2035,30,32,31,32,31,31,29,30,30,29,29,31),
			2036=>array(2036,31,31,32,31,31,31,30,29,30,29,30,30),
			2037=>array(2037,31,31,32,32,31,30,30,29,30,29,30,30),
			2038=>array(2038,31,32,31,32,31,30,30,30,29,29,30,31),
			2039=>array(2039,31,31,31,32,31,31,29,30,30,29,30,30),
			2040=>array(2040,31,31,32,31,31,31,30,29,30,29,30,30),
			2041=>array(2041,31,31,32,32,31,30,30,29,30,29,30,30),
			2042=>array(2042,31,32,31,32,31,30,30,30,29,29,30,31),
			2043=>array(2043,31,31,31,32,31,31,29,30,30,29,30,30),
			2044=>array(2044,31,31,32,31,31,31,30,29,30,29,30,30),
			2045=>array(2045,31,32,31,32,31,30,30,29,30,29,30,30),
			2046=>array(2046,31,32,31,32,31,30,30,30,29,29,30,31),
			2047=>array(2047,31,31,31,32,31,31,30,29,30,29,30,30),
			2048=>array(2048,31,31,32,31,31,31,30,29,30,29,30,30),
			2049=>array(2049,31,32,31,32,31,30,30,30,29,29,30,30),
			2050=>array(2050,31,32,31,32,31,30,30,30,29,30,29,31),
			2051=>array(2051,31,31,31,32,31,31,30,29,30,29,30,30),
			2052=>array(2052,31,31,32,31,31,31,30,29,30,29,30,30),
			2053=>array(2053,31,32,31,32,31,30,30,30,29,29,30,30),
			2054=>array(2054,31,32,31,32,31,30,30,30,29,30,29,31),
			2055=>array(2055,31,31,32,31,31,31,30,29,30,29,30,30),
			2056=>array(2056,31,31,32,31,32,30,30,29,30,29,30,30),
			2057=>array(2057,31,32,31,32,31,30,30,30,29,29,30,31),
			2058=>array(2058,30,32,31,32,31,30,30,30,29,30,29,31),
			2059=>array(2059,31,31,32,31,31,31,30,29,30,29,30,30),
			2060=>array(2060,31,31,32,32,31,30,30,29,30,29,30,30),
			2061=>array(2061,31,32,31,32,31,30,30,30,29,29,30,31),
		    2062=>array(2062,30,32,31,32,31,31,29,30,29,30,29,31),
			2063=>array(2063,31,31,32,31,31,31,30,29,30,29,30,30),
			2064=>array(2064,31,31,32,32,31,30,30,29,30,29,30,30),
			2065=>array(2065,31,32,31,32,31,30,30,30,29,29,30,31),
			2066=>array(2066,31,31,31,32,31,31,29,30,30,29,29,31),
			2067=>array(2067,31,31,32,31,31,31,30,29,30,29,30,30),
			2068=>array(2068,31,31,32,32,31,30,30,29,30,29,30,30),
			2069=>array(2069,31,32,31,32,31,30,30,30,29,29,30,31),
			2070=>array(2070,31,31,31,32,31,31,29,30,30,29,30,30),
			2071=>array(2071,31,31,32,31,31,31,30,29,30,29,30,30),
			2072=>array(2072,31,32,31,32,31,30,30,29,30,29,30,30),
			2073=>array(2073,31,32,31,32,31,30,30,30,29,29,30,31),
			2074=>array(2074,31,31,31,32,31,31,30,29,30,29,30,30),
			2075=>array(2075,31,31,32,31,31,31,30,29,30,29,30,30),
			2076=>array(2076,31,32,31,32,31,30,30,30,29,29,30,30),
			2077=>array(2077,31,32,31,32,31,30,30,30,29,30,29,31),
			2078=>array(2078,31,31,31,32,31,31,30,29,30,29,30,30),
			2079=>array(2079,31,31,32,31,31,31,30,29,30,29,30,30),
			2080=>array(2080,31,32,31,32,31,30,30,30,29,29,30,30),
			2081=>array(2081, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
			2082=>array(2082, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
			2083=>array(2083, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
			2084=>array(2084, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
			2085=>array(2085, 31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30),
			2086=>array(2086, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
			2087=>array(2087, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30),
			2088=>array(2088, 30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30),
			2089=>array(2089, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
			2090=>array(2090, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30)
			);
			
	public function getNepaliNumbers($number)
    {
        $eng_number = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "-", "+"," ");
        $nep_number = array("०", "१", "२", "३", "४", "५", "६", "७", "८", "९", "-", "+"," ");
        return str_replace($eng_number, $nep_number, $number);
    }
	/**
	 * Initialize the user preferences
	 *
	 * Accepts an associative array as input, containing display preferences
	 *
	 * @access	public
	 * @param	array	config preferences
	 * @return	void
	 */
	function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Generate the calendar
	 *
	 * @access	public
	 * @param	integer	the year
	 * @param	integer	the month
	 * @param	array	the data to be shown in the calendar cells
	 * @return	string
	 */
	function generate($year = '', $month = '', $date='', $data = array(),$emploayeeName = '')
	{ 
		// Set and validate the supplied month/year
		$Nepali_calendar = new Nepali_calendar();
		
		if($year == '' || $month == '' || $date == ''){
		  //  echo "sss";exit();
			$year  = date("Y", $this->local_time);
			
    		$month = date("m", $this->local_time);
    			
    		$date = date("j", $this->local_time);
    		
    // 		var_dump($year,$month,$date);exit();
            // $fornumday = $Nepali_calendar->AD_to_BS($year,$month,10);
    		$nepalidate = $Nepali_calendar->AD_to_BS((int)$year,(int)$month,(int)$date);
    		$fornumday = $Nepali_calendar->BS_to_AD((int)$nepalidate['year'],(int)$nepalidate['month'],28);
    		$year = $nepalidate['year'];
    		$month = $nepalidate['month'];
    		$date = $nepalidate['date']; 
    		$numday = $fornumday['num_day'];
    // 		var_dump($nepalidate);exit();
		}else{
		  //  var_dump($year,$month,$date);exit();
		    $englishdate = $Nepali_calendar->BS_to_AD($year,$month,28);
		  //  $nepalidate = $Nepali_calendar->AD_to_BS($englishdate['year'],$englishdate['month'],$englishdate['date']);
		  //  var_dump($nepalidate);exit();
		    $year = $year;
    		$month = $month;
    		$date = $date;
    		$numday = $englishdate['num_day'];
		}  
			

		if (strlen($year) == 1)
			$year = '200'.$year;

		if (strlen($year) == 2)
			$year = '20'.$year;

		if (strlen($month) == 1)
			$month = '0'.$month;

		$adjusted_date = $this->adjust_date($month, $year);

		$month	= $adjusted_date['month'];
		$year	= $adjusted_date['year'];

		// Determine the total days in the month
// 		var_dump($year,$month);exit;
		$total_days = $this->get_total_days($month, $year);
		
// 		var_dump($total_days,$month,$year);exit();

		// Set the starting day of the week
		$start_days	= array('sunday' => 0, 'monday' => 1, 'tuesday' => 2, 'wednesday' => 3, 'thursday' => 4, 'friday' => 5, 'saturday' => 6);
		$start_day = ( ! isset($start_days[$this->start_day])) ? 0 : $start_days[$this->start_day];
        // var_dump($start_day);exit();
		// Set the starting day number
// 		$local_date = mktime(12, 0, 0, $month, 1, $year);
// 		$date = getdate($local_date);
// 		$day  = $start_day + 1 - $date["wday"];
        
        $day  = $start_day + 1 - $numday;

		while ($day > 1)
		{
			$day -= 7;
		}

		// Set the current month/year/day
		// We use this to determine the "today" date
		$cur_year	= date("Y", $this->local_time);
		$cur_month	= date("m", $this->local_time);
		$cur_day	= date("j", $this->local_time);
		
		$nepali_current_date = $Nepali_calendar->AD_to_BS($cur_year,$cur_month,$cur_day);
		// var_dump($nepali_current_date);exit();
		$is_current_month = ($nepali_current_date['year'] == $year AND $nepali_current_date['month'] == $month) ? TRUE : FALSE;

// 		$is_current_month = ($cur_year == $year AND $cur_month == $month) ? TRUE : FALSE;
        // var_dump($is_current_month);exit();
		// Generate the template data array
		$this->parse_template();

		// Begin building the calendar output
		$out = $this->temp['table_open'];
		$out .= "\n";

		$out .= "\n";
		$out .= $this->temp['heading_row_start'];
		$out .= "\n";

		// "previous" month link
		if ($this->show_next_prev == TRUE)
		{
			// Add a trailing slash to the  URL if needed
			$this->next_prev_url = preg_replace("/(.+?)\/*$/", "\\1/",  $this->next_prev_url);

			$adjusted_date = $this->adjust_date($month - 1, $year);
			$out .= str_replace('{previous_url}', $this->next_prev_url.$adjusted_date['year'].'/'.$adjusted_date['month'].'/'.$date, $this->temp['heading_previous_cell']);
			$out .= "\n";
		}

		// Heading containing the month/year
		$colspan = ($this->show_next_prev == TRUE) ? 5 : 7;

		$this->temp['heading_title_cell'] = str_replace('{colspan}', $colspan, $this->temp['heading_title_cell']);
		$this->temp['heading_title_cell'] = str_replace('{heading}', $this->get_month_name($month)."&nbsp;".$this->getNepaliNumbers($year).' ( '.$emploayeeName.' )', $this->temp['heading_title_cell']);

		$out .= $this->temp['heading_title_cell'];
		$out .= "\n";

		// "next" month link
		if ($this->show_next_prev == TRUE)
		{
			$adjusted_date = $this->adjust_date($month + 1, $year);
			$out .= str_replace('{next_url}', $this->next_prev_url.$adjusted_date['year'].'/'.$adjusted_date['month'].'/'.$date, $this->temp['heading_next_cell']);
		}

		$out .= "\n";
		$out .= $this->temp['heading_row_end'];
		$out .= "\n";

		// Write the cells containing the days of the week
		$out .= "\n";
		$out .= $this->temp['week_row_start'];
		$out .= "\n";

		$day_names = $this->get_day_names();

		for ($i = 0; $i < 7; $i ++)
		{
			$out .= str_replace('{week_day}', $day_names[($start_day + $i) %7], $this->temp['week_day_cell']);
		}

		$out .= "\n";
		$out .= $this->temp['week_row_end'];
		$out .= "\n";
        // var_dump($day,$total_days);exit;
		// Build the main body of the calendar
		while ($day <= $total_days)
		{
			$out .= "\n";
			$out .= $this->temp['cal_row_start'];
			$out .= "\n";

			for ($i = 0; $i < 7; $i++)
			{
			    $out .= ($is_current_month == TRUE AND $day == $nepali_current_date['date']) ? $this->temp['cal_cell_start_today'] : $this->temp['cal_cell_start'];
			    
				// $out .= ($is_current_month == TRUE AND $day == $cur_day) ? $this->temp['cal_cell_start_today'] : $this->temp['cal_cell_start'];

				if ($day > 0 AND $day <= $total_days)
				{
				    $respengdate = $Nepali_calendar->BS_to_AD($year,$month,$day);
					if (isset($data[$day]))
					{
				// 		echo "<pre>";
				// 		var_dump($data[$day]);
				// 		exit();
						$explode = explode(" ",$data[$day]);
						// var_dump($explode);
				// 		if($explode[0]=="LEAVE"){
				// 			$class = "leave"; 
				// 		}else if($explode[0]=="Added"){
				// 			$class = "added"; 
				// 		}else{
				// 			$class = " "; 
				// 		}
						
						if(in_array("विदा", $explode)){
						    $class = "leave";
						}else if(in_array("Added", $explode)){
						    $class = "added"; 
						}else if(in_array("शनिवार", $explode) || in_array("holiday", $explode)){
							$class = "holiday";
						}else{
						    $class = " ";
						}

						if (in_array("शनिवार", $explode) || in_array("holiday", $explode))
  						{
  							$classContent = "contentTitle";
  						}else{
  							$classContent = " ";
  						} 
						// Cells with content
				// 		$temp = ($is_current_month == TRUE AND $day == $cur_day) ? $this->temp['cal_cell_content_today'] : $this->temp['cal_cell_content'];
						$temp = ($is_current_month == TRUE AND $day == $nepali_current_date['date']) ? $this->temp['cal_cell_content_today'] : $this->temp['cal_cell_content'];
						
						$out .= str_replace('{classContent}', $classContent, str_replace('{class}', $class, str_replace('{day}', $Nepali_calendar->convert_into_nepali_number($day), str_replace('{day_en}',$respengdate['date'], str_replace('{content}', $data[$day], $temp)))));
				// 		$out .= str_replace('{day}', $day, str_replace('{content}', $data[$day], $temp));
					}
					else
					{
						// Cells with no content
				// 		$temp = ($is_current_month == TRUE AND $day == $cur_day) ? $this->temp['cal_cell_no_content_today'] : $this->temp['cal_cell_no_content'];
						$temp = ($is_current_month == TRUE AND $day == $nepali_current_date['date']) ? $this->temp['cal_cell_no_content_today'] : $this->temp['cal_cell_no_content'];
						
						$out .= str_replace('{class}', 'notadded', str_replace('{day_en}',$respengdate['date'], str_replace('{day}', $Nepali_calendar->convert_into_nepali_number($day), $temp))) ;
				// 		$out .= str_replace('{day}', $day, $temp);
					}
				}
				else
				{
					// Blank cells
					$out .= $this->temp['cal_cell_blank'];
				}
				
				$out .= ($is_current_month == TRUE AND $day == $nepali_current_date['date']) ? $this->temp['cal_cell_end_today'] : $this->temp['cal_cell_end'];	

				// $out .= ($is_current_month == TRUE AND $day == $cur_day) ? $this->temp['cal_cell_end_today'] : $this->temp['cal_cell_end'];					
				$day++;
			}

			$out .= "\n";
			$out .= $this->temp['cal_row_end'];
			$out .= "\n";
		}

		$out .= "\n";
		$out .= $this->temp['table_close'];

		return $out;
	}

	// --------------------------------------------------------------------

	/**
	 * Get Month Name
	 *
	 * Generates a textual month name based on the numeric
	 * month provided.
	 *
	 * @access	public
	 * @param	integer	the month
	 * @return	string
	 */
	function get_month_name($month)
	{
	    if ( count($this->translated_month_names)==12 )
		{
		    $new_translated_month_names = array();
		    foreach( $this->translated_month_names as $key=>$value ){
		        $new_translated_month_names[$key]= $value;
		    }
			$month_names = $new_translated_month_names;
		}
		elseif ($this->month_type == 'short')
		{
			$month_names = array('01' => 'cal_jan', '02' => 'cal_feb', '03' => 'cal_mar', '04' => 'cal_apr', '05' => 'cal_may', '06' => 'cal_jun', '07' => 'cal_jul', '08' => 'cal_aug', '09' => 'cal_sep', '10' => 'cal_oct', '11' => 'cal_nov', '12' => 'cal_dec');
		}
		else
		{
			$month_names = array('01' => 'cal_january', '02' => 'cal_february', '03' => 'cal_march', '04' => 'cal_april', '05' => 'cal_mayl', '06' => 'cal_june', '07' => 'cal_july', '08' => 'cal_august', '09' => 'cal_september', '10' => 'cal_october', '11' => 'cal_november', '12' => 'cal_december');
		}

		$month = $month_names[$month];

		if ($this->CI->lang->line($month) === FALSE)
		{
			return ucfirst(str_replace('cal_', '', $month));
		}

		return $this->CI->lang->line($month);
	}

	// --------------------------------------------------------------------

	/**
	 * Get Day Names
	 *
	 * Returns an array of day names (Sunday, Monday, etc.) based
	 * on the type.  Options: long, short, abrev
	 *
	 * @access	public
	 * @param	string
	 * @return	array
	 */
	function get_day_names($day_type = '')
	{
		if ($day_type != '')
			$this->day_type = $day_type;
        
        if ( count($this->translated_day_names)==7 )
		{
			$day_names = $this->translated_day_names;
		}
		elseif ($this->day_type == 'long')
		{
			$day_names = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
		}
		elseif ($this->day_type == 'short')
		{
			$day_names = array('sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat');
		}
		else
		{
			$day_names = array('su', 'mo', 'tu', 'we', 'th', 'fr', 'sa');
		}

		$days = array();
		foreach ($day_names as $val)
		{
			$days[] = ($this->CI->lang->line('cal_'.$val) === FALSE) ? ucfirst($val) : $this->CI->lang->line('cal_'.$val);
		}

		return $days;
	}

	// --------------------------------------------------------------------

	/**
	 * Adjust Date
	 *
	 * This function makes sure that we have a valid month/year.
	 * For example, if you submit 13 as the month, the year will
	 * increment and the month will become January.
	 *
	 * @access	public
	 * @param	integer	the month
	 * @param	integer	the year
	 * @return	array
	 */
	function adjust_date($month, $year)
	{
		$date = array();

		$date['month']	= $month;
		$date['year']	= $year;

		while ($date['month'] > 12)
		{
			$date['month'] -= 12;
			$date['year']++;
		}

		while ($date['month'] <= 0)
		{
			$date['month'] += 12;
			$date['year']--;
		}

		if (strlen($date['month']) == 1)
		{
			$date['month'] = '0'.$date['month'];
		}

		return $date;
	}

	// --------------------------------------------------------------------

	/**
	 * Total days in a given month
	 *
	 * @access	public
	 * @param	integer	the month
	 * @param	integer	the year
	 * @return	integer
	 */
	function get_total_days($month, $year)
	{
// 		$days_in_month	= array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

// 		if ($month < 1 OR $month > 12)
// 		{
// 			return 0;
// 		}

// 		// Is the year a leap year?
// 		if ($month == 2)
// 		{
// 			if ($year % 400 == 0 OR ($year % 4 == 0 AND $year % 100 != 0))
// 			{
// 				return 29;
// 			}
// 		}

// 		return $days_in_month[$month - 1];
// 		var_dump((int)$year,(int)$month);exit;
		$days_in_month = $this->bs[(int)$year][(int)$month];

		if ($month < 1 OR $month > 12)
		{
			return 0;
		}
		
		return $days_in_month;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Default Template Data
	 *
	 * This is used in the event that the user has not created their own template
	 *
	 * @access	public
	 * @return array
	 */
	function default_template()
	{
		return  array (
						'table_open'				=> '<table border="0" cellpadding="4" cellspacing="0">',
						'heading_row_start'			=> '<tr>',
						'heading_previous_cell'		=> '<th><a href="{previous_url}">&lt;&lt;</a></th>',
						'heading_title_cell'		=> '<th colspan="{colspan}">{heading}</th>',
						'heading_next_cell'			=> '<th><a href="{next_url}">&gt;&gt;</a></th>',
						'heading_row_end'			=> '</tr>',
						'week_row_start'			=> '<tr>',
						'week_day_cell'				=> '<td>{week_day}</td>',
						'week_row_end'				=> '</tr>',
						'cal_row_start'				=> '<tr>',
						'cal_cell_start'			=> '<td>',
						'cal_cell_start_today'		=> '<td>',
						'cal_cell_content'			=> '<a href="{content}">{day}</a>',
						'cal_cell_content_today'	=> '<a href="{content}"><strong>{day}</strong></a>',
						'cal_cell_no_content'		=> '{day}',
						'cal_cell_no_content_today'	=> '<strong>{day}</strong>',
						'cal_cell_blank'			=> '&nbsp;',
						'cal_cell_end'				=> '</td>',
						'cal_cell_end_today'		=> '</td>',
						'cal_row_end'				=> '</tr>',
						'table_close'				=> '</table>'
					);
	}

	// --------------------------------------------------------------------

	/**
	 * Parse Template
	 *
	 * Harvests the data within the template {pseudo-variables}
	 * used to display the calendar
	 *
	 * @access	public
	 * @return	void
	 */
	function parse_template()
	{
		$this->temp = $this->default_template();

		if ($this->template == '')
		{
			return;
		}

		$today = array('cal_cell_start_today', 'cal_cell_content_today', 'cal_cell_no_content_today', 'cal_cell_end_today');

		foreach (array('table_open', 'table_close', 'heading_row_start', 'heading_previous_cell', 'heading_title_cell', 'heading_next_cell', 'heading_row_end', 'week_row_start', 'week_day_cell', 'week_row_end', 'cal_row_start', 'cal_cell_start', 'cal_cell_content', 'cal_cell_no_content',  'cal_cell_blank', 'cal_cell_end', 'cal_row_end', 'cal_cell_start_today', 'cal_cell_content_today', 'cal_cell_no_content_today', 'cal_cell_end_today') as $val)
		{
			if (preg_match("/\{".$val."\}(.*?)\{\/".$val."\}/si", $this->template, $match))
			{
				$this->temp[$val] = $match['1'];
			}
			else
			{
				if (in_array($val, $today, TRUE))
				{
					$this->temp[$val] = $this->temp[str_replace('_today', '', $val)];
				}
			}
		}
	}

}

// END CI_Calendar class

/* End of file Calendar.php */
/* Location: ./system/libraries/Calendar.php */