select *
from prizes
where laureate_id like ':id'
  and deleted = 0