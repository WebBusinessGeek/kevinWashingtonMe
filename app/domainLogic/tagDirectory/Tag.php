<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/2/15
 * Time: 5:43 PM
 */

namespace App\DomainLogic\TagDirectory;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['title'];

	protected $table = 'tags';

	public function skills()
	{
		return $this->morphedByMany('App\DomainLogic\SkillDirectory\Skill', 'taggable');
	}

    protected $modelAttributes = [
		0 => [

            'name' => 'title',

			'format' => 'string',

			'nullable' => false,

			'unique' => true,

			'exists' => null,

            'identifier' => false,

            'key' => false,


			'enumValues' => [
				'item1',
				'item2',
				'item3'
			]
		],


    ];



}