import { ComponentFixture, TestBed } from '@angular/core/testing';
import { BattlePage } from './battle.page';

describe('BattlePage', () => {
  let component: BattlePage;
  let fixture: ComponentFixture<BattlePage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(BattlePage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
