<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Rewards class
 */

class Rewards extends Model	//TODO: This class is named with plural while the general practice is to name models singular
{
	/**
	 * Inserts or updates a rewards
	 */
	public function save_value(array &$rewards_data, bool $rewards_id = FALSE): bool
	{
		$builder = $this->db->table('sales_reward_points');
		if(!$rewards_id || !$this->exists($rewards_id))		//TODO: looks like we are missing the exists function in this class
		{
			if($builder->insert($rewards_data))
			{
				$rewards_data['id'] = $this->db->insertID();

				return TRUE;
			}

			return FALSE;
		}

		$builder->where('id', $rewards_id);

		return $builder->update($rewards_data);
	}
}