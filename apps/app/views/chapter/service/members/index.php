<div id="service">
  
  <div class="heading clearfix">
    <h2><?= $this->title ?></h2>
    <div class="right no-print">
      <span class="print-link"><a href="javascript:window.print();">Printer Friendly</a></span>
    </div>
  </div>
  
  <table>
    <thead>
      <tr>
        <th>Group</th>
        <th class="amount right">Hours</th>
        <th class="amount right">Donations</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->summary as $group): ?>
        <tr>
          <td><?= $group['title'] ?></td>
          <td class="right"><?= number_format($group['hours'], 1) ?></td>
          <td class="right"><?= money::display($group['dollars']) ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td class="right">Totals:</td>
        <td class="right"><?= format::plural(number_format($this->summary_sum['hours'], 1), '@count hour', '@count hours') ?></td>
        <td class="right"><?= money::display($this->summary_sum['dollars']) ?></td>
      </tr>
    </tfoot>
  </table>
  
  <div class="heading clearfix">
    <h2><?= $this->members_title; ?></h2>
  </div>

  <?= message::get() ?>
  
  <div id="tabbed-section" class="clearfix">
    <ul>
      <li><?= html::anchor('service/members', 'Actives ('. number_format($this->list_counts['active']) .')') ?></li>
      <li><?= html::anchor('service/members/pledge', 'New Members ('. number_format($this->list_counts['pledge']) .')') ?></li>
      <li><?= html::anchor('service/members/alumni', 'Alumni ('. number_format($this->list_counts['alumni']) .')') ?></li>
      <li><?= html::anchor('service/members/archive', 'Archived Members *') ?></li>
      <li><?= html::anchor('service/members/all', 'All Members') ?></li>
    </ul>
  </div>

  <div>
    <table class="sort">
      <thead>
        <tr>
          <th class="{sorter: 'link_sort'}">Member</th>
          <th class="amount right {sorter: 'digit'}">Hours</th>
          <th class="amount right">Dollars</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->members as $member): ?>
          <?php if (($this->type == $member->type || $this->type == 'all') && ($member->status || $this->records[$member->id]->hours || $this->records[$member->id]->dollars)): ?>
            <tr class="hoverable">
              <td class="title">
                <?= html::anchor('service/members/'. $member->id, $member->name()) ?>
                <?php if ($this->type == 'all' && $member->type == 'archive'): ?>
                  <em>Archived</em>
                <?php endif ?>
              </td>
              <td class="right"><?= number_format($this->records[$member->id]->hours, 1) ?></td>
              <td class="right"><?= money::display($this->records[$member->id]->dollars) ?></td>
            </tr>
          <?php endif ?>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <tr>
          <td class="right">Totals:</td>
          <td class="right"><?= format::plural(number_format($this->sum['hours'], 1), '@count hour', '@count hours') ?></td>
          <td class="right"><?= money::display($this->sum['dollars']) ?></td>
        </tr>
      </tfoot>
    </table>
  </div>

  <?php if ($this->type == 'archive'): ?>
    <div class="small right">
      * Only archived members who recorded hours in the selected period are shown.
    </div>      
  <?php endif ?>

</div>