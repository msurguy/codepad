<?php

class Post extends Eloquent
{
	public function getDateAttribute()
	{
		$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
		return $date;
	}

	public static function presentContent($content)
	{
		$type = $content->type;

		switch ($type) {
			case 'heading':
				return self::presentHeading($content);
				break;
			case 'text':
				return self::presentText($content);
				break;
			case 'quote':
				return self::presentQuote($content);
				break;
			case 'list':
				return self::presentUl($content);
				break;
			case 'ordered_list':
				return self::presentOl($content);
				break;
			case 'video':
				return self::presentVideo($content);
				break;
			default:
				return 'type';
				break;
		}
	}

	public static function presentHeading($content)
	{
		return '<h2>'.Markdown::defaultTransform($content->data->text).'</h2>';
	}

	public static function presentText($content)
	{
		return Markdown::defaultTransform($content->data->text);
	}

	public static function presentVideo($content)
	{
		if ($content->data->source == 'youtube') $str = '<iframe type="text/html" width="640" height="390" src="http://www.youtube.com/embed/'.$content->data->remote_id.'" frameborder="0" allowfullscreen></iframe>';
		if ($content->data->source == 'vimeo') $str = '<iframe src="//player.vimeo.com/video/'.$content->data->remote_id.'" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		return $str;
	}

	public static function presentUl($content)
	{
		return Markdown::defaultTransform($content->data->text);
	}

	public static function presentOl($content)
	{
		return Markdown::defaultTransform($content->data->text);
	}

	public static function presentQuote($content)
	{
		$parsedContent = Markdown::defaultTransform($content->data->text);
		if ($cite = $content->data->cite) 
			$parsedContent = str_replace("</blockquote>", "<small>{$cite}</small></blockquote>",$parsedContent);
		return $parsedContent;
	}
}