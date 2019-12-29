select *
from affiliations
where laureate_id like ':id'
  and laureate_prize_number like ':number'